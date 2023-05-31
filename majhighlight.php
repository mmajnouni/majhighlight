<?php
   /*
   Plugin Name: Maj highlight coder Plugin
   Plugin URI: https://majn.me
   description: My first WordPress Plugin about highlight your code in post.
   Version: 1.0.0
   Author: Morteza Majnouni
   Author URI: https://majn.me
   */
  define("PS_URI", plugin_dir_url(__FILE__));
  define("PS_CSS", trailingslashit(PS_URI . "assets/css"));
  define("PS_JS", trailingslashit(PS_URI . "assets/js"));

  add_action('wp_enqueue_scripts','load_prism_assets');

  function load_prism_assets(){
     
      wp_enqueue_style('r-prismcss', PS_CSS . "prism.css");
      wp_enqueue_script('r-prismjs', PS_JS . "prism.js");
    
   
}

add_filter('the_content','pp_fix_ltr',10,1);
function pp_fix_ltr($code){
   
  $pattern = '/wp-block-code/';
    $replace = 'wp-block-code fix-ltr';
    $code = preg_replace($pattern,$replace,$code);


    return $code;
}

 

 