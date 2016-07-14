<?php

namespace App\Traits;

use App\Http\Requests;
use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Models\User;
use App\Models\Profiles;
use Session;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Illuminate\Auth\AuthManager as Auth;

trait FbTrait
{
    /**
     *  fb call funtion
     *  $request
     *  $fb
     *  $user
     *  $profile
     *  $auth
     */
    public function fbcallback(Request $request, LaravelFacebookSdk $fb, User $user, Profiles $profile, Auth $auth)
    {
        // GetAccessToken
        try {
            $token = $fb->getAccessTokenFromRedirect();
            if (!$token) {
                return redirect('/')->with('error', 'Unable to obtain access token.');
            }
        } catch (FacebookQueryBuilderException $e) {
            return redirect('/')->with('error', $e->getPrevious()->getMessage());

        }

        // Check Type of Access Token
        if (!$token->isLongLived()) {
            $oauth_client = $fb->getOAuth2Client();
            try {
                $token = $oauth_client->getLongLivedAccessToken($token);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                return redirect('/')->with('error', $e->getPrevious()->getMessage());
            }
        }

        $fb->setDefaultAccessToken($token);

        // Save for later
        $request->session()->put('fb_user_access_token', (string) $token);

        // Get basic info on the user from Facebook.
        try {
            $response = $fb->get('/me?fields=id,verified,name,email,first_name,last_name,picture,gender,timezone,birthday,bio');
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            return redirect('/')->with('error', $e->getPrevious()->getMessage());
        }

        // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
        $facebook_user = $response->getGraphNode();

        //check if has valid account to avoid user register with unverified fb account
        if ($facebook_user['verified'] != true){

            return redirect('/')->with('status', 'Please verified your Facebook Account');

        }

        $user_check = $user->where('email', '=', $facebook_user['email'])->first();
        $fb_check = $profile->where('facebook_user_id', '=', $facebook_user['id'])->first();

        /*
         * todo add mail send to user register
         */
        if ($user_check === null || $fb_check === null) {

            $profile->newProfile($facebook_user, $token);

            $this->guard()->login($user->newUser($facebook_user));

            return redirect($this->redirectPath());

           }

        // Create the user if it does not exist or update the existing entry.
        // This will only work if you've added the SyncableGraphNodeTrait to your User model.
        $user = $user_check->createOrUpdateGraphNode($facebook_user);

        // Log the user into Laravel
        $auth->login($user);

        return redirect('/')->with('status', 'Successfully logged in');
    
    }

}

