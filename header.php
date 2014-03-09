<?php
/*------------------------------------------------------------------------
# Global News WordPress Theme v1.1 - August 2012
# ------------------------------------------------------------------------
# Copyright (C) 2008 instantShift. All Rights Reserved.
# @license - Global News WordPress Theme is available under the terms of the GNU General Public License.
# Author: http://www.rapidxhtml.com
# Websites:  http://www.instantshift.com
-------------------------------------------------------------------------*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes()?>>
<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type')?>; charset=<?php bloginfo('charset')?>" />
  <title><?php
  global $page, $paged;
  wp_title( '|', true, 'right' );
  bloginfo( 'name' );
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
  ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <meta name="author" content="RapidxHTML" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' )?>?v=20120901" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' )?>" />
  <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory')?>/images/favicon.ico?v=20120901" />
  <?php wp_head()?>
</head>
<body <?php body_class()?>>

<div class="page">

<!-- Wrapper -->
<div class="rapidxwpr">

  <!-- Header -->
  <div id="header">

    <div class="forcast">
    <!--[if !IE]><!-->
    <?php
      $feed_url = "http://weather.yahooapis.com/forecastrss?p=".stripslashes(get_option('gbn_weather_location'))."&u=c";
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL,"$feed_url");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
      $xmlTwitter = curl_exec($curl);
      curl_close($curl);
      $xml = simplexml_load_string($xmlTwitter);
      foreach ($xml->channel as $line) {
      $xml->registerXpathNamespace('yweather', 'http://xml.weather.yahoo.com/ns/rss/1.0');
      $children = $xml->xpath('//channel/yweather:location');
      echo "<strong>{$children[0]['city']}</strong><br />";
      $wdescription = $line->item->description;
      echo weather_string($wdescription,7);
      }
      echo " C";
    ?>
    <!--<![endif]-->
    </div>
    
    <!-- Logo -->
    <div class="logo">
    <a href="<?php echo get_option('home')?>/" title="<?php bloginfo('name')?> - <?php bloginfo('description')?>"><img id="logo" src="<?php bloginfo('stylesheet_directory')?>/images/logo.png" alt="<?php bloginfo('name')?>" title="<?php bloginfo('name')?> - <?php bloginfo('description')?>" /></a>
    </div>
    <!-- /Logo -->
    
    <!-- today date -->
    <div class="today-date">
      <a href='<?php bloginfo('rss2_url')?>'><?php _e("RSS FEED") ?></a><br />
      <?php echo date(__e('l, F jS Y'))?>
    </div>
    <!-- / today date -->

  </div>
  <!-- /Header -->

  <!-- Main Menu -->
  <?php wp_nav_menu( array( 'container_id' => 'mainmenu', 'depth' => 2, 'menu_class' => 'sf-menu', 'theme_location' => 'topmenu' ) )?>
  <!-- /Main Menu -->
