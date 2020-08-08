<?php

/*
Plugin Name: atozsites Comments
Description: Analyze comments to determine which are most articulate & relevant. Place them near the top of the post.
Author: atozsites
Version: 1.0
Author URI: https://atozsites.com
*/

define( 'atozsites_COMMENTS_DIR_NAME', plugin_basename(__FILE__) );

function atozsites_comments_text_domain() {
    load_plugin_textdomain( 'atozsites-comments', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

// Setup class autoloader
require_once dirname(__FILE__) . '/src/CommentIQ/Autoloader.php';
CommentIQ_Autoloader::register();

// Load Comment IQ
$commentiq_plugin = new CommentIQ_Plugin(__FILE__);
add_action( 'plugins_loaded', array( $commentiq_plugin, 'load' ) );
add_action( 'plugins_loaded', 'atozsites_comments_text_domain' );
