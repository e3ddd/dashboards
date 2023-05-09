<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokensController extends Controller
{
    public function createToken(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        $token = $user->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    }

    public function getUserTokens()
    {
        if(Auth::check()){
            $tokens = PersonalAccessToken::where('tokenable_id', Auth::user()->id)->get();

            $response = [];

            foreach ($tokens as $token){
                $response[] = [
                    'id' => $token['id'],
                    'name' => $token['name'],
                    'created_at' => $token['created_at']
                ];
            }
            return $response;
        }
    }

    public function destroyToken(Request $request)
    {
        PersonalAccessToken::destroy($request->tokenId);
    }
}
