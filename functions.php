<?php
/*------------------------------------------------------------------------
# Global News WordPress Theme v1.1 - August 2012
# ------------------------------------------------------------------------
# Copyright (C) 2008 instantShift. All Rights Reserved.
# @license - Global News WordPress Theme is available under the terms of the GNU General Public License.
# Author: http://www.rapidxhtml.com
# Websites:  http://www.instantshift.com
-------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) {
  $content_width = 764;
}

load_theme_textdomain('globalnews', get_template_directory() . '/languages');

//exit(get_template_directory() . '/languages');
//phpinfo(); exit;
// Theme Setup
add_action( 'after_setup_theme', 'twentyten_setup' );
if ( ! function_exists( 'twentyten_setup' ) ):
function twentyten_setup() {
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'mainimage', 440, 300, true );
  add_image_size( 'home-thumb', 80, 60, true );
  add_image_size( 'home-slider', 150, 115, true );
  add_image_size( 'cat-thumb', 120, 88, true );
  add_theme_support( 'automatic-feed-links' );
  register_nav_menus( array(
    'topmenu' => __( 'Main Navigation', 'globalnews' ),
  ));
}
endif;

function twentyten_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

function twentyten_excerpt_length( $length ) {
  return 100;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

function twentyten_continue_reading_link() {
  return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'globalnews' ) . '</a>';
}

function twentyten_auto_excerpt_more( $more ) {
  return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

function twentyten_custom_excerpt_more( $output ) {
  if ( has_excerpt() && ! is_attachment() ) {
    $output .= twentyten_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

// Register Widget Function
function twentyten_widgets_init() {
  register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'globalnews' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'globalnews' ),
    'before_widget' => '<div id="%1$s" class="sidebox sideboxlist %2$s">'."\n",
    'after_widget' => '</div>'."\n\n",
    'before_title' => '<h3 class="widget-title">'."\n",
    'after_title' => '</h3>'."\n",
  ) );
}
add_action( 'widgets_init', 'twentyten_widgets_init' );

// Limit Chars
function string_limit_words($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) {
  array_pop($words);
  echo implode(' ', $words)."..."; } else {
  echo implode(' ', $words); }
}

// Weather Widget
function weather_string($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

// First Last Nav Classes
function nav_menu_first_last( $items ) {
 $position = strrpos($items, 'class="menu-item', -1);
 $items=substr_replace($items, 'menu-item-last ', $position+7, 0);
 $position = strpos($items, 'class="menu-item');
 $items=substr_replace($items, 'menu-item-first ', $position+7, 0);
 return $items;
}
add_filter( 'wp_nav_menu_items', 'nav_menu_first_last' );

// Theme Options
$themename = "GlobalNews";
$shortname = "gbn";
$options = array (
  array(  "type" => "open"),
  array(  "name" => "Look & Feel Settings",
          "type" => "title"),
  array(  "type" => "paneopen"),
  array(  "name" => "Path to logo file",
          "desc" => "Should be relative path aka: 'logos/mylogo.png'",
          "id" => $shortname."_logo_path",
          "std" => "logo.png",
          "style" => "width:250px;",
          "type" => "text_last"),
  array(  "type" => "paneclose"),
  array(  "name" => "News Settings",
          "type" => "title"),
  array(  "type" => "paneopen"),
  array(  "name" => "Weather Location",
          "desc" => "<a href=\"http://weather.yahoo.com\">Location zip code</a> for Weather Widget.",
          "id" => $shortname."_weather_location",
          "std" => "SFXX0044",
          "style" => "width:150px;",
          "type" => "text"),
  array(  "name" => "Featured Articles",
          "desc" => "Number of News Articles in Featured Section to be displayed.",
          "options" => array('1', '2', '3', '4', '5'),
          "id" => $shortname."_featured_num",
          "std" => "1",
          "style" => "width:150px;",
          "type" => "select"),
  array(  "name" => "Newsticker Articles",
          "desc" => "Number of News Articles in Newsticker to be displayed.",
          "id" => $shortname."_newsticker_num",
          "std" => "20",
          "style" => "width:150px;",
          "type" => "text"),
  array(  "name" => "Headline Articles",
          "desc" => "Number of News Articles in Headline Section to be displayed.",
          "options" => array('3', '4', '5', '6', '7', '8', '9', '10'),
          "id" => $shortname."_headline_num",
          "std" => "3",
          "style" => "width:150px;",
          "type" => "select"),
  array(  "name" => "Slideshow Articles",
          "desc" => "Number of News Articles in Slideshow to be displayed.",
          "id" => $shortname."_slideshow_num",
          "std" => "6",
          "style" => "width:150px;",
          "type" => "text"),
  array(  "name" => "Newsflash Articles",
          "desc" => "Number of News Articles in each Newsflash to be displayed.",
          "id" => $shortname."_newsflash_num",
          "options" => array('2', '3', '4', '5', '6'),
          "std" => "2",
          "type" => "select_last"),
  array(  "type" => "paneclose"),
  array(  "name" => "Advertisement Blocks Settings",
          "type" => "title"),
  array(  "type" => "paneopen"),
  array(  "name" => "Homepage 120x600 Advertisement",
          "desc" => "HTML code of advertisement banner of size 120px X 600px on homepage at top right.",
          "id" => $shortname."_ad_120x600_pri_mainpage",
          "std" => '<script type="text/javascript"><!--
google_ad_client = "pub-7312757316631264";
google_ad_slot = "9523843188";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>',
          "style" => "width:95%;height:150px;",
          "type" => "textarea"),
  array(  "name" => "Homepage 300x250 Advertisement",
          "desc" => "HTML code of advertisement banner of size 300px X 250px on homepage at footer bottom right.",
          "id" => $shortname."_ad_300x250_pri_mainpage",
          "std" => '<a href="http://www.rapidxhtml.com" target="_blank"><img src="http://www.rapidxhtml.com/images/300x250_rapidxhtml.jpg" alt="PSD to HTML" /></a>',
          "style" => "width:95%;height:150px;",
          "type" => "textarea"),
  array(  "name" => "Post page 300x250 Primary Advertisement",
          "desc" => "HTML code of advertisement banner of size 300px X 250px on post pages at top right sidebar.",
          "id" => $shortname."_ad_300x250_pri_singlepage",
          "std" => '<script type="text/javascript"><!--
google_ad_client = "pub-7312757316631264";
google_ad_slot = "3570711115";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>',
           "style" => "width:95%;height:150px;",
          "type" => "textarea"),
  array(  "name" => "Post page 300x250 Secondary advertisement",
          "desc" => "HTML code of advertisement banner of size 300px X 250px on post pages at middle right sidebar.",
           "id" => $shortname."_ad_300x250_sec_singlepage",
          "std" => '<script type="text/javascript"><!--
google_ad_client = "pub-7312757316631264";
google_ad_slot = "3570711115";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>',
          "style" => "width:95%;height:150px;",
          "type" => "textarea"),
  array(  "name" => "Post page 300x250 footer advertisement",
          "desc" => "HTML code of advertisement banner of size 300px X 250px on post pages at footer bottom right.",
          "id" => $shortname."_ad_300x250_footer_singlepage",
          "std" => '<a href="http://www.rapidxhtml.com" target="_blank"><img src="http://www.rapidxhtml.com/images/300x250_rapidxhtml.jpg" alt="PSD to HTML" /></a>',
          "style" => "width:95%;height:150px;",
          "type" => "textarea_last"),
  array(  "type" => "paneclose"),
  array(  "type" => "close"),
);

function mytheme_add_admin() {
  global $themename, $shortname, $options;
  if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ){
    if ( 'save' == isset($_REQUEST['action']) ) {
      foreach ($options as $value) {
        update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
      foreach ($options as $value) {
        if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
      header("Location: themes.php?page=functions.php&saved=true");
      die;
    } else if( 'reset' == isset($_REQUEST['action']) ) {
      foreach ($options as $value) {
        delete_option( $value['id'] ); }
      header("Location: themes.php?page=functions.php&reset=true");
      die;
    }
  }
  add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
  global $themename, $shortname, $options;
  if ( isset($_REQUEST['saved']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
  if ( isset($_REQUEST['reset']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<style type="text/css">
  <!--
  .basic{width:90%;margin:5px 0 0 0;font-family:Georgia, "Times New Roman", Times, serif;}
  .basic td{font-family:Arial, Helvetica, sans-serif;}
  .basic input, .basic select, .basic textarea{font-size:12px;padding:5px;color:#666;font-weight:normal;}
  .basic select{height:27px;padding:3px;}
  .basic input:focus, .basic textarea:focus{color:#222;}
  .basic div.panel{background:#F6F6F6;font-weight:bold;font-size:11px;padding:10px;border:1px solid #CCC;border-top:0;-webkit-border-bottom-right-radius:3px;-webkit-border-bottom-left-radius:3px;-moz-border-radius-bottomright:3px;-moz-border-radius-bottomleft:3px;border-bottom-right-radius:3px;border-bottom-left-radius:3px;}
  .basic div.panel small{color:#666;font-size:11px;font-weight:normal;}
  .basic a.block{cursor:default;display:block;padding:5px 10px 7px 10px;margin:0;text-decoration:none;font-size:13px;color:black;background:#E5E5E5;border:1px solid #CCC;-webkit-border-top-left-radius:3px;-webkit-border-top-right-radius:3px;-moz-border-radius-topleft:3px;-moz-border-radius-topright:3px;border-top-left-radius:3px;border-top-right-radius:3px;margin:20px 0 0 0;font-family:Arial, Helvetica, sans-serif;font-weight:bold;color:#333;}
  .basic a.block.selected{color:black;background:#96ebff;}
  span.desc_notes{display:block;font-weight:normal;color:#777;font-size:12px;font-style:italic;}
  span.desc_notes strong{color:#333;}
  -->
</style>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2><?php echo $themename?> Settings</h2>
<div class="clear"></div>
<form method="post">
<p style="font-size:11px;font-family:Verdana, Geneva, sans-serif;color:#C00;text-decoration:underline;margin:20px 0 0 0;">Always remember to save your changes</p>
<div class="basic">
<?php foreach ($options as $value) { 
  switch ($value['type']) {
  
    case "open": ?>
    
    <?php break;  
    case "close": ?>
        
    <?php break;
    case "paneopen": ?>
    <div class="panel">
    <table width="100%" cellpadding="0" cellspacing="3" border="0">
    
    <?php break;
    case "paneclose": ?>
    </table>
    </div>
    
    <?php break;
    case "subpanegap": ?>
    <tr>
      <td colspan="2"><hr style="background:#CCC;height:1px;border:0;margin:15px 75px;" /></td>
    </tr>
    
    <?php break;
    case "title": ?>
    <a class="block"><?php echo $value['name']?></a>
    
    <?php break;
    case 'text': ?>

    <tr>
      <td width="20%" valign="top" align="right" style="padding:5px 20px 0 0;font-size:12px;font-weight:bold;"><?php echo $value['name']?></td>
      <td width="80%"><input style="width:700px;<?php echo $value['style']?>" name="<?php echo $value['id']?>" id="<?php echo $value['id']?>" type="<?php echo $value['type']?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /><span class="desc_notes"><?php echo $value['desc']?></span></td>
    </tr>
    <tr>
      <td colspan="2" style="padding:5px;"><hr style="height:1px;background:#CCC;border:0;" /></td>
    </tr>

    <?php break;
    case 'text_last': ?>

    <tr>
      <td width="20%" valign="top" align="right" style="padding:5px 20px 0 0;font-size:12px;font-weight:bold;"><?php echo $value['name']?></td>
      <td width="80%"><input style="width:700px;<?php echo $value['style']?>" name="<?php echo $value['id']?>" id="<?php echo $value['id']?>" type="<?php echo $value['type']?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
    </tr>

    <?php break;
    case 'select': ?>

    <tr>
      <td width="20%" valign="top" align="right" style="padding:5px 20px 0 0;font-size:12px;font-weight:bold;"><?php echo $value['name']?></td>
      <td width="80%"><select style="width:150px;<?php echo $value['style']?>" name="<?php echo $value['id']?>" id="<?php echo $value['id']?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option?></option><?php } ?></select><span class="desc_notes"><?php echo $value['desc']?></span></td>
    </tr>
    <tr>
      <td colspan="2" style="padding:5px;"><hr style="height:1px;background:#CCC;border:0;" /></td>
    </tr>

    <?php break;
    case 'select_last': ?>

    <tr>
      <td width="20%" valign="top" align="right" style="padding:5px 20px 0 0;font-size:12px;font-weight:bold;"><?php echo $value['name']?></td>
      <td width="80%"><select style="width:150px;<?php echo $value['style']?>" name="<?php echo $value['id']?>" id="<?php echo $value['id']?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option?></option><?php } ?></select><span class="desc_notes"><?php echo $value['desc']?></span></td>
    </tr>

    <?php break;
    case 'textarea': ?>
        
    <tr>
      <td width="20%" valign="top" align="right" style="padding:5px 20px 0 0;font-size:12px;font-weight:bold;"><?php echo $value['name']?></td>
      <td width="80%">
      <textarea name="<?php echo $value['id']?>" style="width:95%;height:100px;<?php echo $value['style']?>" type="<?php echo $value['type']?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" style="padding:5px;"><hr style="height:1px;background:#CCC;border:0;" /></td>
    </tr>

    <?php break;
    case 'textarea_last': ?>
        
    <tr>
      <td width="20%" valign="top" align="right" style="padding:5px 20px 0 0;font-size:12px;font-weight:bold;"><?php echo $value['name']?></td>
      <td width="80%">
      <textarea name="<?php echo $value['id']?>" style="width:95%;height:100px;<?php echo $value['style']?>" type="<?php echo $value['type']?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea></td>
    </tr>

    <?php break;            
    case "checkbox": ?>
    <tr>
      <td width="20%" valign="top" align="right" style="padding:5px 20px 0 0;font-size:12px;font-weight:bold;"><?php echo $value['name']?></td>
      <td width="80%"><? if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
      <input type="checkbox" name="<?php echo $value['id']?>" id="<?php echo $value['id']?>" value="true" <?php echo $checked?> /></td>
    </tr>
            
    <?php break;
  } 
}
?>
</div>
  <div class="clear"></div>
  <p class="submit" style="float:left;margin:0;">
    <input name="save" type="submit" class="button-primary" value="<?php _e( 'Save Options', 'lttrapidx' )?>" />
    <input type="hidden" name="action" value="save" />
  </p>
</form>
<form method="post">
  <p class="submit" style="float:left;margin:0 0 0 10px;">
    <input name="reset" type="submit" class="button-primary" value="<?php _e( 'Reset Options', 'lttrapidx' )?>" />
    <input type="hidden" name="action" value="reset" />
  </p>
</form>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');

// JavaScript Functions
if(!is_admin()) {
  function my_init_method() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri().'/js/jquery.min.js', false, '1.7.2', true);
    wp_enqueue_script('jquery');
  }
  function move_comment_reply_js() {
    if(is_single() && comments_open() && get_option('thread_comments')) {
      wp_register_script('comment-reply', null, 'jquery', '1.7.2', true);
      wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('jquery-superfish', get_template_directory_uri().'/js/superfish.js', 'jquery', '1.4.8', true);
    wp_enqueue_script('jquery-fancybox', get_template_directory_uri().'/js/fancybox/jquery.fancybox.js', 'jquery', '2.1.0', true);
    if(is_front_page()) {
      wp_enqueue_script('jquery-jcarousel', get_template_directory_uri().'/js/jcarousellite.js', 'jquery', '1.7.2', true);
      wp_enqueue_script('jquery-ticker', get_template_directory_uri().'/js/ticker.js', 'jquery', '1.7.2', true);
    }
  }
  add_action('init', 'my_init_method'); 
  add_action('wp_print_scripts', 'move_comment_reply_js');
}

// CSS Functions
function theme_styles() { 
  wp_enqueue_style( 'superfish', get_template_directory_uri() . '/css/superfish.css', array(), '1.4.8', 'all' );
  wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css', array(), '2.1.0', 'all' );
  wp_enqueue_style( 'print', get_template_directory_uri() . '/css/print.css', array(), '1.0.1', 'print' );
}
add_action('wp_enqueue_scripts', 'theme_styles');

// Version Removal
function complete_version_removal() {
  return '';
}
add_filter('the_generator', 'complete_version_removal');

// Shortcodes
function rapidx_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'rapidx_one_half');

function rapidx_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'rapidx_one_half_last');

function rapidx_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'rapidx_one_third');

function rapidx_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'rapidx_one_third_last');

function rapidx_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'rapidx_two_third');

function rapidx_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'rapidx_two_third_last');

function rapidx_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'rapidx_one_fourth');

function rapidx_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'rapidx_one_fourth_last');

function rapidx_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'rapidx_three_fourth');

function rapidx_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'rapidx_three_fourth_last');

function rapidx_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'rapidx_one_fifth');

function rapidx_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'rapidx_one_fifth_last');

function rapidx_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'rapidx_two_fifth');

function rapidx_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'rapidx_two_fifth_last');

function rapidx_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'rapidx_three_fifth');

function rapidx_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'rapidx_three_fifth_last');

function rapidx_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'rapidx_four_fifth');

function rapidx_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'rapidx_four_fifth_last');

function rapidx_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'rapidx_one_sixth');

function rapidx_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'rapidx_one_sixth_last');

function rapidx_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'rapidx_five_sixth');

function rapidx_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'rapidx_five_sixth_last');

function rapidx_formatter($content) {
  $new_content = '';
  $pattern_full = '{(\[raw\].*?\[/raw\])}is';
  $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
  $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
  foreach ($pieces as $piece) {
    if (preg_match($pattern_contents, $piece, $matches)) {
      $new_content .= $matches[1];
    } else {
      $new_content .= wptexturize(wpautop($piece));
    }
  }
  return $new_content;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'rapidx_formatter', 99);
add_filter('widget_text', 'rapidx_formatter', 99);
@ini_set('pcre.backtrack_limit', 500000);
