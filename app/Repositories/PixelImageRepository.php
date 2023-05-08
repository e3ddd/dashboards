<?php

namespace App\Repositories;

use App\Models\AboutUser;
use App\Models\User;
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Mockery\Exception;

class PixelImageRepository
{
    /**
     * Check exist pixel in DB
     * @param string|null $userPixel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function checkPixel($userPixel, $ip, $userId)
    {
        if($userPixel === null){
            throw new RuntimeException('Pixel required');
        }

        if(User::where('user_pixel', $userPixel)->doesntExist()){
            return redirect('/');
        }

        $this->recordUserAgent($userId, $ip);

        return response(
            base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==')
        )
            ->withHeaders([
                    'Content-Type' => 'image/gif']
            );
    }

    /**
     * Get pixel code
     * @param  integer|null $userId
     * @return mixed
     */
    public function getUserPixel($userId)
    {
        if($userId === null){
            throw new \RuntimeException('User id required');
        }

        return User::find($userId)->user_pixel;
    }

    /**
     * @param integer|null $userId
     * @param string|null $ip
     * @return void
     * @throws \GeoIp2\Exception\AddressNotFoundException
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     */
    public function recordUserAgent($userId, $ip)
    {
        if($userId === null){
            throw new \RuntimeException('User id required');
        }

        if($ip === null){
            throw new \RuntimeException('IP required');
        }

        $agent = new Agent();
        $cityDbReader = new Reader('/home/developer/workspace/GeoIP2/GeoLite2-City_20230502/GeoLite2-City.mmdb');



        $platforms = ['Ubuntu', 'Windows', 'OS X'];
        $devices = ['Phone', 'Tablet', 'PC', 'Nexus'];
        $browsers = ['Chrome', 'IE', 'Opera', 'Mozila'];
        $languages = ['eu' ,'ua', 'ru', 'ch'];

        $platform = $platforms[rand(0,2)];
//        $platform = $agent->platform();
        $browser = $browsers[rand(0,3)];
//        $browser = $agent->browser();
        $device = $devices[rand(0,3)];
//        $device = $agent->device();
//        $language = $agent->languages()[0];
        $language = $languages[rand(0,3)];

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

        AboutUser::create([
            'user_id' => $userId,
            'user_ip' => $ip,
            'city' => $city,
            'platform' => $platform,
            'browser' => $browser,
            'device' => $device,
            'language' => $language,
        ]);
    }
}
