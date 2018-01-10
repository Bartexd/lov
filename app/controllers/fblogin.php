<?php

namespace Controllers;

use App\App;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Models\Controllers\FacebookUser;

class fblogin implements Controller
{
    private static function url()
    {
        return sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME']
        );
    }

    public function delete($args = [])
    {
        session_destroy();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    /**
     * @param array $args
     */
    public function index($args = [])
    {
        /* @var App::$facebook \Facebook\Facebook */

        $helper = App::$facebook->getRedirectLoginHelper();
        $permissions = ['email'];

        try {
            if (isset($_SESSION['facebook_access_token'])) {
                $accessToken = $_SESSION['facebook_access_token'];
            } else {
                $accessToken = $helper->getAccessToken();
            }
        } catch (FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            if (isset($_SESSION['facebook_access_token'])) {
                App::$facebook->setDefaultAccessToken($_SESSION['facebook_access_token']);
            } else {
                $_SESSION['facebook_access_token'] = (string)$accessToken;
                $oAuth2Client = App::$facebook->getOAuth2Client();
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
                $_SESSION['facebook_access_token'] = (string)$longLivedAccessToken;
                App::$facebook->setDefaultAccessToken($_SESSION['facebook_access_token']);
            }

            try {
                $profile_request = App::$facebook->get('/me?fields=first_name,last_name,email,picture');
                $profile = $profile_request->getGraphUser();
            } catch (FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                session_destroy();
                header('Location: ' . self::url());
                exit;
            } catch (FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            if ($profile->getEmail() == null) {
                echo "<h1>[BLAD] PRAWDOPODOBNIE TWOJ EMAIL NA FACEBOOKU NIE ZOSTAL POTWIERZONY, I NIE MOZE ZOSTAC UZYTY DO ZALOGOWANIA SIE NA STRONIE</h1>";
                session_destroy();
                header('Location: ' . self::url());
            }

            $u_id = FacebookUser::createUser($profile->getFirstName(), $profile->getLastName(), $profile->getEmail(), $profile->getPicture()->getUrl(), $_SERVER['REMOTE_ADDR']);
//            echo FacebookUser::createUser($profile->getFirstName(), $profile->getLastName(), $profile->getEmail(), $profile->getPicture()->getUrl());

            $_SESSION['user'] = $u_id;
            header('Location: ' . self::url());
        } else {
            // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
            $loginUrl = $helper->getLoginUrl(self::url() . '/login', $permissions);
            header("Location: " . $loginUrl);
        }


    }

    public function get($args = [])
    {
        // TODO: Implement get() method.
    }

    public function post($args = [])
    {
        // TODO: Implement post() method.
    }

    public function patch($args = [])
    {
        // TODO: Implement patch() method.
    }

    public function update($args = [])
    {
        // TODO: Implement update() method.
    }
}