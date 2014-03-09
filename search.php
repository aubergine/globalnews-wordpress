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

  <!-- main body -->
  <div id="middle_single">
  
    <!-- right column -->
    <div id="right" class="clearingfix">
    
      <?php get_sidebar()?>
    
    </div>
    <!-- / right column -->
    
    <!-- content column -->
    <div id="main" class="clearingfix">

<?php if ( have_posts() ) : ?>
      <h3 class="pagetitle"><?php printf(__('Search Results for "%"', get_search_query())) ?></h3>
        <?php
         get_template_part( 'loop', 'search' );
        ?>
<?php else : ?>
        <div id="post-0" class="post no-results not-found">
          <h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' )?></h2>
          <div class="entry-content">
            <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' )?></p>
            <?php get_search_form()?>
          </div><!-- .entry-content -->
        </div><!-- #post-0 -->
<?php endif?>

    </div>
    <!-- / content column -->
  
  </div>
  <!-- / main body -->

  <!-- main body -->
  <div id="middle_alt">
  
    <!-- right column -->
    <div id="right_alt" class="clearingfix">
    
      <!-- advert -->
      <div class="advert">
        <?php echo stripslashes(get_option('gbn_ad_300x250_footer_singlepage'))?>
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
            <?php query_posts('showposts=1&tag=headlines')?>
            <?php while (have_posts()) : the_post()?>
            <li>
              <h5 class="category"><?php the_category(' ')?></h5>
              <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></h3>
              <p><?php if(has_post_thumbnail()) { ?><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('home-thumb') ?></a><?php } ?>
              <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,16)?></p>
              <div class="meta"><?php the_time(__('F jS, Y')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more") ?></a></div>
            </li>
            <?php endwhile?>
            <?php wp_reset_query()?>
          </ul>
        </div>
        
        <div class="boxes">
          <ul>
            <?php query_posts('showposts=1&tag=headlines&offset=1')?>
            <?php while (have_posts()) : the_post()?>
            <li>
              <h5 class="category"><?php the_category(' ')?></h5>
              <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></h3>
              <p><?php if(has_post_thumbnail()) { ?><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('home-thumb') ?></a><?php } ?>
              <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,16)?></p>
              <div class="meta"><?php the_time(__('F jS, Y')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more") ?></a></div>
            </li>
            <?php endwhile?>
            <?php wp_reset_query()?>
          </ul>
        </div>
        
        <div class="boxes">
          <ul>
            <?php query_posts('showposts=1&tag=headlines&offset=2')?>
            <?php while (have_posts()) : the_post()?>
            <li>
              <h5 class="category"><?php the_category(' ')?></h5>
              <h3><a href="<?php the_permalink() ?>" title="<?php the_title()?>" class="title"><?php the_title()?></a></h3>
              <p><?php if(has_post_thumbnail()) { ?><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('home-thumb') ?></a><?php } ?>
              <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,16)?></p>
              <div class="meta"><?php the_time(__('F jS, Y')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more") ?></a></div>
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
