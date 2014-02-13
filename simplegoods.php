<?php
    
    /*
    Plugin Name: Simple Goods
    Description: Add Simple Goods checkout directly to your WordPress site & blog. This plugin will turn any Simple Goods links (https://www.simplegoods.co/i/xxxxxxx) into a checkout popup automatically.
    Stable tag: 0.11
    Version: 0.11
    Author: Simple Goods Co. 
    Author URI: https://www.simplegoods.co
    Plugin URI: https://www.simplegoods.co/docs/#wordpress
    */

    define('SIMPLEGOODS_DIR', plugin_dir_url(__FILE__));

    function addSGScripts() {
        wp_enqueue_script( 'simplegoodsjs', SIMPLEGOODS_DIR . 'assets/js/embed.js', array(), array(), true );
    }

    function sgButtonShortcode( $atts ) {
        extract( shortcode_atts( array(
            'text' => 'Buy Now',
            'link' => "https://www.simplegoods.co/i/LLBWZDJF",
            'class' => 'simple-goods-btn'
        ), $atts ) );

        return '<a class="'. $class .'" href="'. $link .'">'. $text .'</a>';
    }

    add_shortcode( 'sgbutton', 'sgButtonShortcode' );
    add_action( 'wp_enqueue_scripts', 'addSGScripts' ); 
?>