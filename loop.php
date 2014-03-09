<?php if ( ! have_posts() ) : ?>
  <div id="post-0" class="post error404 not-found">
    <h1 class="entry-title"><?php _e( 'Not Found', 'globalnews' )?></h1>
    <div class="entry-content">
      <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'globalnews' )?></p>
      <?php get_search_form()?>
    </div>
  </div>
<?php endif?>

<?php if(is_archive() || is_search() || is_category() || is_tag() || is_author()) { ?>
  <?php static $itemcount = 1; while ( have_posts() ) : the_post(); $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' )?>
      <div class="archivepage<?php echo $itemcount?> clearingfix">
        <h3 id="post-<?php the_ID()?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__("Permanent Link to %s"), the_title_attribute()) ?>"><?php the_title()?></a></h3>
        <div class="postmetadata alt"><span><?php printf(__("By %s"), the_author_posts_link()) ?></span><?php the_time(__('l, F jS, Y')) ?></div>
  
        <?php if(has_post_thumbnail()): ?>
        <a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_post_thumbnail('cat-thumb') ?></a>
        <?php endif ?>
        <?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,45)?>
      </div>
      <?php $itemcount++; if($itemcount=='3'){$itemcount=1;}?>
  <?php endwhile?>
<div class="pagination">
<?php
global $wp_query; $big = 999999999;
echo paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'mid_size' => '10',
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages
) );
?>
</div>
<?php } else { ?>
  <?php static $count = 0; while ( have_posts() ) : the_post()?>
        <!-- post -->
        <div id="post-<?php the_ID()?>" <?php post_class('post-count'.$count)?>>
          <div class="post_header">
            <h2 class="post_title"><a href="<?php the_permalink()?>" title="<?php printf( esc_attr__('Permalink to %s', 'globalnews'), the_title_attribute( 'echo=0' ) )?>" rel="bookmark"><?php the_title()?></a></h2>
          </div>
          <div class="post_meta">
            <span class="post_cats">
              <?php printf(__("Posted in %"), the_category(', ')) ?>
              <span class="post_comments_iphone"> | &nbsp;<?php comments_popup_link()?></span>
            </span>
            <span class="post_date">
                <?php the_time(__('F jS, Y')) ?> <?php _e("By %s", the_author_posts_link()) ?>
            </span>
            <span class="post_comments"><?php comments_popup_link()?></span>
          </div>
          <div class="post_entry">
            <?php the_content(__('Read more...')) ?>
          </div>
          <div class="post_footer">
            <div id="FbCont-post-<?php the_ID()?>">
              <!-- TODO: is this Facebook like works?-->
              <script type="text/javascript">
                <!--//--><![CDATA[//><!--
                var fb = document.createElement('fb:like'); 
                fb.setAttribute("href","<?php the_permalink()?>");
                fb.setAttribute("send","false");
                fb.setAttribute("width","550");
                fb.setAttribute("show_faces","false");
                fb.setAttribute("action","like");
                fb.setAttribute("font","verdana");
                document.getElementById("FbCont-post-<?php the_ID()?>").appendChild(fb);
                //--><!]]>
              </script>
            </div>
          </div>
        </div>
        <!-- / post -->
  <?php $count++?>
  <?php endwhile?>
<div class="pagination">
<?php
global $wp_query; $big = 999999999;
echo paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'mid_size' => '10',
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages
) );
?>
</div>
<?php } ?>