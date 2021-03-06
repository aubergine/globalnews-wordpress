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

  <!-- newsticker -->
  <script type="text/javascript">
    <!--
    var newsticker = [
      <?php query_posts('showposts='.stripslashes(get_option('gbn_newsticker_num')).'')?>
      <?php while (have_posts()) : the_post()?>
        [{
          'description': '<?php the_title()?>',
          'link': '<?php the_permalink() ?>',
          'category': '<?php the_category(' ')?>'
        }],
      <?php endwhile?>
      <?php wp_reset_query()?>
    ];
    //-->
  </script>
  <div class="newsticker">
    <div id="newsticker"><p>&nbsp;</p></div>
  </div>
  <!-- /newsticker -->

  <!-- main home -->
  <div class="main_home">
  
    <!-- featured post -->
    <div class="featured_post">
      <?php query_posts('showposts='.stripslashes(get_option('gbn_featured_num')).'&tag=featured')?>
      <?php while (have_posts()) : the_post()?>
      <?php if(has_post_thumbnail()) { ?>
      <div class="featured_post_image"><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('mainimage') ?></a></div>
      <?php } ?>
      <h1><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_title()?></a></h1>
      <?php the_content(__('Read more...', 'globalnews'))?>
      <?php endwhile?>
      <?php wp_reset_query()?>
    </div>
    <!-- / featured post -->
    
    <!-- highlights -->
    <div class="highlights">
      <ul>
        <?php query_posts('showposts='.stripslashes(get_option('gbn_headline_num')).'&tag=headlines')?>
        <?php while (have_posts()) : the_post()?>
        <li>
          <h5 class="category"><?php the_category(' ')?></h5>
          <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></h3>
          <p><?php if(has_post_thumbnail()) { ?><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('home-thumb') ?></a><?php } ?>
          <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,25)?></p>

          <div class="meta"><?php the_time(__('F jS, Y', 'globalnews')) ?> | <?php comments_popup_link() ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more", 'globalnews') ?></a></div>
        </li>
        <?php endwhile?>
        <?php wp_reset_query()?>
      </ul>

      <?php get_sidebar('homepage') ?>
    </div>
    <!-- / highlights -->
    
    <!-- featured banner -->
    <div class="featured_banner">
      <?php echo stripslashes(get_option('gbn_ad_120x600_pri_mainpage'))?>
    </div>
    <!-- / featured banner -->
  
  </div>
  <!-- / main home -->
  
  <!-- news jcarousel -->
  <div id="news-jcarousel" class="clearingfix">
    <div class="news-jcarousel-meta clearingfix">
      <h3 id="news-jcarousel1"><?php _e("Today's Highlights", 'globalnews') ?></h3>
      <a id="prevbut" title="prev"></a>
      <a id="nextbut" title="next"></a>
    </div>
    <ul>
      <?php query_posts('showposts='.stripslashes(get_option('gbn_slideshow_num')).'&tag=slideshow'); $carouselid=1?>
      <?php while (have_posts()) : the_post()?>
      <li><b><a href="<?php the_permalink() ?><?php // fix $values = get_post_custom_values("thumb"); echo $values[0]?>" title="<?php the_title()?>" class="fix_zoom"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail('home-slider') ?><?php } ?></a><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></b></li>
      <?php $carouselid++?>
      <?php endwhile?>
      <?php wp_reset_query()?>
    </ul>
  </div>
  <!-- / news jcarousel -->

  <!-- main body -->
  <div id="middle">
  
    <!-- right column -->
    <div id="right" class="clearingfix">
      
      <!-- advert -->
      <div class="advert">
        <?php echo stripslashes(get_option('gbn_ad_300x250_pri_mainpage'))?>
      </div>
      <!-- advert -->
    
    </div>
    <!-- / right column -->
    
    <!-- content column -->
    <div id="main_alt" class="clearingfix">
    
      <!-- news boxes -->
      <div class="news_boxes">
      
        <div class="boxes first">
          <ul>
            <?php query_posts('showposts='.stripslashes(get_option('gbn_newsflash_num')).'&tag=newsflash1')?>
            <?php while (have_posts()) : the_post()?>
            <li>
              <h5 class="category"><?php the_category(' ')?></h5>
              <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></h3>
              <p><?php if(has_post_thumbnail()) { ?><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('home-thumb') ?></a><?php } ?>
              <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,16)?></p>
              <div class="meta"><?php the_time(__('F jS, Y', 'globalnews')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more", 'globalnews') ?></a></div>
            </li>
            <?php endwhile?>
            <?php wp_reset_query()?>
          </ul>
        </div>
        
        <div class="boxes">
          <ul>
            <?php query_posts('showposts='.stripslashes(get_option('gbn_newsflash_num')).'&tag=newsflash2')?>
            <?php while (have_posts()) : the_post()?>
            <li>
              <h5 class="category"><?php the_category(' ')?></h5>
              <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></h3>
              <p><?php if(has_post_thumbnail()) { ?><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('home-thumb') ?></a><?php } ?>
              <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,16)?></p>
              <div class="meta"><?php the_time(__('F jS, Y', 'globalnews')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more", 'globalnews') ?></a></div>
            </li>
            <?php endwhile?>
            <?php wp_reset_query()?>
          </ul>
        </div>
        
        <div class="boxes">
          <ul>
            <?php query_posts('showposts='.stripslashes(get_option('gbn_newsflash_num')).'&tag=newsflash3')?>
            <?php while (have_posts()) : the_post()?>
            <li>
              <h5 class="category"><?php the_category(' ')?></h5>
              <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></h3>
              <p><?php if(has_post_thumbnail()) { ?><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('home-thumb') ?></a><?php } ?>
              <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,16)?></p>
              <div class="meta"><?php the_time(__('F jS, Y', 'globalnews')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more", 'globalnews') ?></a></div>
            </li>
            <?php endwhile?>
            <?php wp_reset_query()?>
          </ul>
        </div>
      
      </div>
      <!-- / news boxes -->
    
    </div>
    <!-- / content column -->
  
  </div>
  <!-- / main body -->

<?php get_footer()?>