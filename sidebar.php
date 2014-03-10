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

<?php  if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : endif?>
