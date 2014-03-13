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
    
      <?php
        global $wp_query;
        $cats = get_the_category();
        $tempQuery = $wp_query;
        $currentId = $post->ID;
        $catlist = "";
        forEach( $cats as $c ) {
          if( $catlist != "" ) { $catlist .= ","; }
          $catlist .= $c->cat_ID;
        }
        $newQuery = "posts_per_page=5&cat=" . $catlist;
        query_posts( $newQuery );
        $categoryPosts = "";
        $count = 0;
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            if( $count<4 && $currentId!=$post->ID) {
              $count++;
              $categoryPosts .= '<li><a href="' . get_permalink() . '">' . the_title( "", "", false ) . '</a></li>';
            }
          }
        }
        $wp_query = $tempQuery;
      ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post()?>
      <?php if($categoryPosts != '') { ?>
      <!-- sidebox -->
      <div class="sidebox" id="also_in">
        <h3>Also in "<?php the_category(', ');?>"</h3>
        <ul class="single_extras">
          <?php echo $categoryPosts?>
        </ul>
      </div>
      <!-- / sidebox -->
      <?php } ?>
      <?php endwhile;?>

      <?php get_sidebar()?>
    
    </div>
    <!-- / right column -->
    
    <!-- content column -->
    <div id="main">
    
<?php get_template_part( 'loop', 'single' )?>
    
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
              <div class="meta"><?php the_time(__('F jS, Y', 'globalnews')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more", 'globalnews') ?></a></div>
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
              <div class="meta"><?php the_time(__('F jS, Y', 'globalnews')) ?> | <a href="<?php the_permalink() ?>"><?php _e("Read more", 'globalnews') ?></a></div>
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