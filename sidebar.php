<?php
/*------------------------------------------------------------------------
# Global News WordPress Theme v1.1 - August 2012
# ------------------------------------------------------------------------
# Copyright (C) 2008 instantShift. All Rights Reserved.
# @license - Global News WordPress Theme is available under the terms of the GNU General Public License.
# Author: http://www.rapidxhtml.com
# Websites:  http://www.instantshift.com
-------------------------------------------------------------------------*/

get_header();
?>
  <!-- sidebox -->
  <div class="sidebox" id="search">
    <h3>Search</h3>
    <form role="search" method="get" id="searchform" action="<?php echo get_option('home')?>" >
      <ul>
        <li><input type="text" value="" name="s" id="s" /><small>Type keyword for search.</small></li>
        <li><input type="submit" id="searchsubmit" value="Search" /></li>
      </ul>
    </form>
  </div>
  <!-- / sidebox -->
  
  <!-- sidebox -->
  <div class="sidebox" id="subscribe">
    <h3>Breaking News Alerts by E-Mail</h3>
    <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=iShift', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
      <ul>
        <li><input type="text" name="email" class="email" /><small><?php _e("Sign up to be notified for important news.") ?></small></li>
        <li><input type="hidden" value="iShift" name="uri"/><input type="hidden" name="loc" value="en_US"/><input type="submit" value="Subscribe" /></li>
      </ul>
    </form>
  </div>
  <!-- / sidebox -->
  
  <!-- advert -->
  <div class="advert">
    <?php echo stripslashes(get_option('gbn_ad_300x250_pri_singlepage'))?>
  </div>
  <!-- advert -->

  <!-- sidebox -->
  <div class="sidebox" id="related_news">
    <h3>Related News</h3>
    <ul class="single_extras">
      <?php related_posts() ?>
    </ul>
  </div>
  <!-- / sidebox -->
  
  <!-- advert -->
  <div class="advert">
    <?php echo stripslashes(get_option('gbn_ad_300x250_sec_singlepage'))?>
  </div>
  <!-- advert -->

  <?php if(function_exists('c2c_get_recently_commented')) { ?>
  <div class="sidebox" id="recent_commented">
    <h3><?php _e("Recently Commented Articles") ?></h3>
    <ul class="single_extras">
      <?php c2c_get_recently_commented(5, "<li>%comments_URL%</li>")?>
    </ul>
  </div>
  <?php } ?>

<?php  if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : endif?>
