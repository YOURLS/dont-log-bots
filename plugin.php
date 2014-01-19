<?php
/**
Plugin Name: Don't Log Crawlers
Plugin URI: https://github.com/luixxiul/dont-log-crawlers
Description: Prevents YOURLS from counting clicks of crawlers & bots with specific User Agent strings
Version: 1.0
Author: Suguru Hirahara
Author URI: http://www.philosophyguides.org
**/

function dlb_is_crawler() {
    // Get current User-Agent
    $current = strtolower( $_SERVER['HTTP_USER_AGENT'] );
    
    $crawlers = array(
        // List of Active crawlers & bots (imcomplete)
        // picked up from: http://user-agent-string.info/list-of-ua/bots
        '360spider',
        '80legs.com/webcrawler',
        'a6-indexer',
        'aboundex',
        'aboutusbot',
        'addthis.com',
        'ahrefsbot',
        'aihitbot',
        'antbot',
        'archive.org_bot',
        'backlinkcrawler',
        'baiduspider',
        'bingbot',
        'bingpreview',
        'bitlybot',
        'bixocrawler',
        'blekkobot',
        'blexbot',
        'browsershots',
        'butterfly',
        'bufferbot',
        'careerbot',
        'catchbot',
        'ccbot',
        'changedetection.com/bot.html',
        'classbot',
        'coccoc',
        'compspybot',
        'crowsnest',
        'dataminr.com',
        'daumoa',
        'easouspider',
        'exabot',
        'exb language crawler',
        'ezooms',
        'facebookexternalhit',
        'feedfetcher',
        'feedly.com/fetcher.html',
        'feedlybot',
        'fyberspider',
        'genieo',
        'googlebot',
        'grapeshot',
        'hatena-useragent',
        'hubspot connect',
        'ia_archiver',
        'icc-crawler',
        'ichiro',
        'infohelfer',
        'jabse.com crawler',
        'james bot',
        'jyxobot',
        'linkdexbot',
        'linkfluence',
        'loadimpactpageanalyzer',
        'magpie-crawler',
        'mail.ru_bot',
        'meanpathbot',
        'metageneratorcrawler',
        'metajobbot',
        'mj12bot',
        'msnbot-media',
        'najdi.si',
        'nalezenczbot',
        'nekstbot',
        'netcraftsurveyagent',
        'netestate ne crawler',
        'netseer crawler',
        'nuhk',
        'obot',
        'omgilibot',
        'openwebspider',
        'panscient.com',
        'parsijoo',
        'proximic',
        'psbot',
        'readability',
        'rogerbot',
        'searchmetricsbot',
        'semrushbot',
        'seocheckbot',
        'seoengworldbot',
        'seokicks-robot',
        'seznambot',
        'shopwiki.com/wiki/help:bot',
        'showyoubot',
        'sistrix',
        'siteexplorer',
        'socialbm_bot',
        'sogou web spider',
        'sogou',
        'spbot',
        'special_archiver',
        'spiderling',
        'spinn3r',
        'steeler',
        'suggybot',
        'trendiction.com',
        'turnitinbot',
        'tweetedtimes bot',
        'tweetmeme',
        'twitterbot',
        'uaslinkchecker',
        'umbot',
        'unisterbot',
        'unwindfetchor',
        'urlappendbot',
        'vedma',
        'voilabot',
        'wbsearchbot',
        'webcookies',
        'webcrawler at wise-guys dot nl',
        'wesee:search',
        'woko',
        'woriobot',
        'wotbox',
        'y!j-bri',
        'y!j-bro',
        'y!j-brw',
        'y!j-bsc',
        'yacybot',
        'yahoo! slurp',
        'yandexbot',
        'yats',
        'yeti',
        'zb-1',
        'zeerch.com/bot.php',
        'zumbot',

        // accessed when tweeted
        'ning/1.0',
        'yahoo:linkexpander:slingstone',
        'google-http-java-client/1.17.0-rc (gzip)',
        'js-kit url resolver',
        'htmlparser',
        'paperlibot',
        
        // xenu
        'xenu link sleuth',

    );
    
    // Check if the UA string contains any strings listed above
    $is_crawler = ( str_replace( $crawlers, '',$current ) != $current );
    
    return $is_crawler;
}

// Hook stuff in
yourls_add_filter( 'shunt_update_clicks','dlb_skip_if_crawler' );
yourls_add_filter( 'shunt_log_redirect','dlb_skip_if_crawler' );

// Skip if crawler
function dlb_skip_if_crawler() {
    return dlb_is_crawler();
    // if anything but false is returned, functions using the two shunt_* filters will be short-circuited
}
