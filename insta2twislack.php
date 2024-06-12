<?php
require_once('insta_api_php/insta_api.php');
require_once('twitter_api_php/twitter_api.php');
require_once('slack_api_php/slack_api.php');
use tmatsumor\insta_api_php\InstaAPI;
use tmatsumor\twitter_api_php\TwitterAPI;
use tmatsumor\slack_api_php\SlackAPI;

$INSTA_TOKEN = 'YOUR_INSTAGRAM_API_LONG_LIVED_TOKEN_HERE';
$TWI_USERPWD = 'YOUR_TWITTER_API_OAUTH_2.0_CLIENT_ID_AND_SECRET_HERE';
$SLACK_TOKEN = 'YOUR_SLACK_API_USER_OAUTH_TOKEN_HERE';
$SLACK_CHANNEL = 'YOUR_SLACK_CHANNEL_NAME_HERE';

$in = new InstaAPI($INSTA_TOKEN);
$tw = new TwitterAPI($TWI_USERPWD);    // token refresher is working in this constructor
$in->fetchNewPost(function($d) use($tw, $SLACK_TOKEN, $SLACK_CHANNEL){
    var_dump($tw->tweet($d['caption'].' '.$d['permalink']));
    $sl = new SlackAPI($SLACK_TOKEN);
    var_dump($sl->fileUpload($SLACK_CHANNEL, $d['caption'].' '.$d['permalink'], $d['media_url']));
    sleep(1);
});

