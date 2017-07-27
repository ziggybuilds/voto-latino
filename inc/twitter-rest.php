<?php
/*
*
* Twitter REST API
*
*/
?>

<?php 

function fireTwitter() {
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "163637268-QCVBrkvgqETplcWR3ENW5KTqRyA55x2htGdvnGdN",
    'oauth_access_token_secret' => "Ea36PNDINvWcb3co3Imo9SiOvUO9GnT4lYvjvyhls8Jrk",
    'consumer_key' => "6CFKNHE1v2jtzMW29pfV8zRm5",
    'consumer_secret' => "1KnT0BFnALP7CfuzMLT1XemjvC1HEeb8BON8epdhyCFeUyMg8D"
);


$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = 'GET';
$user = get_field('twitter_rest_api', 'options');
$getfield = '?screen_name=' . $user . '&count=1';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

}

fireTwitter();


?>