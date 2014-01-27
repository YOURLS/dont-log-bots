<?php
/**
Plugin Name: Don't Log Bots
Plugin URI: https://github.com/YOURLS/dont-log-bots
Description: Do not log some bots in stats
Version: 1.2
Author: Ozh, Leo Colomb
Author URI: http://yourls.org
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Check current user-agent against a list of bots, return boolean
function ozh_dlb_is_bot() {
    // Get current User-Agent
    $current = strtolower( $_SERVER['HTTP_USER_AGENT'] );
        
    // Array of known bot lowercase strings
    // Example: 'googlebot' will match 'Googlebot/2.1 (+http://www.googlebot.com/bot.html)'
    $bots = array(
        // general web bots
        'googlebot', 'yahoo! slurp',
        'dotbot', 'yeti', 'http://help.naver.com/robots/', 'scoutjet', 
        'http://yandex.com/bots', 'linkedinbot', 'mj12bot', 'http://www.80legs.com/spider.html',
        'exabot', 'msnbot', 'yacybot', 'www.oneriot.com', 'http://flipboard.com/', 
        'baiduspider', 'mxbot', 'bingbot', 'python-urllib', 'unwindfetchor', 
        'windows-live-social-object-extractor-engine', 'asynchttpclient',
        'ask jeeves', 'w3c_validator', 'wget', 'scooter', 'slurp', 'gigabot',
        'gamespyhttp', 'libcurl', 'baiduspider', 'ia_archiver', 'voyager', 'pycurl', 
        'jakarta', 'bot', 'spider', 'twitturls', 'appengine-google', 'java',
                
        // twitter specific bots
        'http://thinglabs.com', 'js-kit url resolver', 'twitterbot', 'njuicebot', 'postrank.com',
        'tweetmemebot', 'longurl api', 'paperlibot', 'http://postpo.st/crawlers',

        // facebook specific bots
        'facebookexternalhit',
    );
        
    // Check if the current UA string contains a know bot string
    $is_bot = ( str_replace( $bots, '', $current ) != $current );
        
    return $is_bot;
}

// Hook stuff in
yourls_add_filter( 'shunt_update_clicks', 'ozh_dlb_skip_if_bot' );
yourls_add_filter( 'shunt_log_redirect', 'ozh_dlb_skip_if_bot' );

// Skip if it's a bot
function ozh_dlb_skip_if_bot() {
    return ozh_dlb_is_bot();
    // if anything but false is returned, functions using the two shunt_* filters will be short-circuited
}
