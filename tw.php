<?php
require 'vendor/autoload.php';
/*
$settings = array(
    'oauth_access_token' => "16601258-pXDTlE32J8JTCsKiPkc3jUlxMsvjqs8Q5qMPK5G6z",
    'oauth_access_token_secret' => "X4e5Ex3TfuniUW79GAb8LN3IBNuwFtCfzftvkg2uVn2yr",
    'consumer_key' => "VxZbZHyWdjnjpipbmZdGQ",
    'consumer_secret' => "5N3sB4to86Q3ijAm1Wayqkey82NaOgQNxkqWk9Txyi0"
);


$url = 'https://api.twitter.com/1.1/search/tweets.json';
//$getfield = '?screen_name=J7mbo';

$getfield = '?q=#Drupal8';

$requestMethod = 'GET';

$twitter = new \TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
var_dump(json_decode($response));
*/

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

/*
 * Create an OAUTH object to begin authentication, attaching it to the Guzzle Client created at bootstrap.php
 */

$oauth = new Oauth1([
    'consumer_key' => "VxZbZHyWdjnjpipbmZdGQ",
    'consumer_secret' => "5N3sB4to86Q3ijAm1Wayqkey82NaOgQNxkqWk9Txyi0"
]);


$client = new Client(['base_url' => 'https://api.twitter.com', 'defaults' => ['auth' => 'oauth']]);

$client->getEmitter()->attach($oauth);

$res = $client->post('oauth/request_token', ['body' => ['oauth_callback' => 'http://[yourawesomehost]/callback.php']]);

$params = (string)$res->getBody();
 
parse_str($params);

print $oauth_token;
print $oauth_token_secret;
