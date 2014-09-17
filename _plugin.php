<?php
/*
Plugin Name:	Can be its own parent.
Plugin URI:		
Description:	
Version:		0.1
Author:			postpostmodern, pinecone-dot-io
Author URI:		http://pinecone.io
*/

register_activation_hook( __FILE__, create_function("", '$ver = "5.3"; if( version_compare(phpversion(), $ver, "<") ) die( "This plugin requires PHP version $ver or greater be installed." );') );

require __DIR__.'/index.php';