<?php
session_start();

global $wpdb;

if(!isset($wpdb))
{
    require_once('../../../../../wp-config.php');
    require_once('../../../../../wp-load.php');
    require_once('../../../../../wp-includes/wp-db.php');
}

require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = azul_top('twitter_user');
$notweets = azul_top('twitter_no');
$consumerkey = azul_top('twitter_consumerkey');
$consumersecret = azul_top('twitter_consumersecret');
$accesstoken = azul_top('twitter_accesstoken');
$accesstokensecret = azul_top('twitter_accesstokensecret');
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>