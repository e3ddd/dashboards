<?php

namespace App\Repositories;

use App\Models\AboutUser;
use App\Models\PageViewStatistic;
use App\Models\PixelGif;
use App\Models\User;
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Mockery\Exception;

class PixelImageRepository
{
    /**
     * Check exist pixel in DB
     * @param string|null $userPixel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function checkPixel($userPixel, $ip)
    {
        if($userPixel === null){
            throw new RuntimeException('Pixel required');
        }

        if(PixelGif::where('pixel', $userPixel)->doesntExist()){
            return redirect('/');
        }

        $this->recordUserAgent($ip);

        return response(
            base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==')
        )
            ->withHeaders([
                    'Content-Type' => 'image/gif']
            );
    }

    /**
     * Create pixel ID
     * @param integer|null $userId
     */
    public function createPixel($userId)
    {
        if($userId === null){
            throw new \RuntimeException('User ID required');
        }

        $pixelUuid = Str::uuid();

        PixelGif::create([
            'user_id' => $userId,
            'pixel' => $pixelUuid
        ]);
    }

    /**
     * Get pixel code
     * @param  integer|null $userId
     * @return mixed
     */
    public function getUserPixels($userId)
    {
        if($userId === null){
            throw new \RuntimeException('User id required');
        }

        return PixelGif::where('user_id', $userId)->get('pixel');
    }

    /**
     * @param string|null $ip
     * @return void
     * @throws \GeoIp2\Exception\AddressNotFoundException
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     */
    public function recordUserAgent($ip)
    {
        if($ip === null){
            throw new \RuntimeException('IP required');
        }

        $agent = new Agent();
        $cityDbReader = new Reader('/home/developer/workspace/GeoIP2/GeoLite2-City_20230502/GeoLite2-City.mmdb');

        $referral = $_SERVER['REQUEST_URI'];

//        $cities = ['Frankfurt', 'Seattle', 'Toronto', 'Paris', 'Washington DC', 'Kiyv', 'Zaporizhe', 'Berlin', 'Deli'];
//        $platforms = ['Ubuntu', 'Windows', 'OS X', 'Fedora', 'Linux', 'Solaris', 'Haiku'];
//        $devices = ['Phone', 'Tablet', 'PC', 'Nexus'];
//        $browsers = ['Chrome', 'IE', 'Opera', 'Mozila', 'Onion', 'Chromium', 'Opera GX'];
//        $languages = ['eu' ,'ua', 'ru', 'ch', 'du', 'pr', 'po', 'gre'];

//        $platform = $platforms[rand(0,6)];
        $platform = $agent->platform();
//        $browser = $browsers[rand(0,6)];
        $browser = $agent->browser();
//        $device = $devices[rand(0,3)];
        $device = $agent->device();
//        $language = $languages[rand(0,7)];
        $language = $agent->languages()[0];

        try {
            $record = $cityDbReader->city($ip);
            $city = $record->city->name;
        }catch (AddressNotFoundException $e){
            $city = null;
            $platform = null;
            $browser = null;
            $device = null;
            $language = null;
        }


        //For tests
//        if($city === null) {
//            $city = $cities[rand(0,8)];
//        }
        //

        AboutUser::create([
            'referral' => $referral,
            'user_ip' => $ip,
            'city' => $city,
            'platform' => $platform,
            'browser' => $browser,
            'device' => $device,
            'language' => $language,
        ]);
    }
}
