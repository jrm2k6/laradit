<?php


namespace JD\Laradit\Helpers;


class OAuthRedditHelper
{

    /**
     * @param clientId string
     * @param responseType string
     * @param redirectUri string
     * @param isPermanent boolean
     * @param scopes array
     */
    public static function getAuthorizeUrlAndState($url, $clientId, $responseType, $redirectUri, $isPermanent, $scopes)
    {
        $state = md5(strftime('%s'));
        $scopesAsString = join(' ', $scopes);
        $duration = ($isPermanent) ? 'permanent' : 'temporary';

        return [
            'url' => $url."?client_id=${clientId}&response_type=${responseType}
            &state=${state}&redirect_uri=${redirectUri}&duration=${duration}&scope=${scopesAsString}",
            'state' => $state
        ];
    }

    public static function authorize($url)
    {
        return redirect($url);
    }
}