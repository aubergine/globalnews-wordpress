<?php if ( have_posts() ) while ( have_posts() ) : the_post()?>

      <div class="post" id="post-<?php the_ID()?>">
        <h1><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_title()?></a></h1>
        <p class="postmetadata">
            <span><?php printf(__("Posted by %s"), the_author_posts_link()) ?></span>
            <?php printf(__("Posted on %s"), the_time('l, F jS, Y')) ?>
        </p>
        <div class="post_image">
          <?php if(has_post_thumbnail()) { ?><a href="<?php echo get_post_meta($post->ID, "thumb", $single = true)?>" title="<?php the_title()?>" class="zoom"><?php the_post_thumbnail('medium') ?></a><br /><?php } ?><br />
          <ul id="post-links" class="clearingfix">
            <li class="email"><?php if(function_exists('wp_email')) { ?><?php email_link()?><?php } ?></li>
            <li class="comments"><a href="#respond"><?php _e("Add Comments") ?></a></li>
            <li class="print"><a href="javascript:window.print()"><?php _e("Print") ?></a></li>
            <script type="text/javascript">var addthis_pub="49f3b26b0ed18b53";</script>
            <li class="favorite"><a href="http://www.addthis.com/bookmark.php?v=20" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><?php _e("Add to Favorites") ?></a></li>
            <script type="text/javascript" src="http://s7.addthis.com/js/200/addthis_widget.js"></script>
            <SCRIPT LANGUAGE="JavaScript">
              <!-- Begin
              function bookmark() {
                bookmarkurl="<?php the_permalink() ?>"
                bookmarktitle="<?php the_title() ?>"
                if (document.all)
                window.external.AddFavorite(bookmarkurl,bookmarktitle)
                else if (window.sidebar) // firefox
                window.sidebar.addPanel(bookmarktitle, bookmarkurl, "");
              }
              // End -->
            </script>
          </ul>
        </div>
        <div class="post_entry"><?php the_content('')?></div>
        <?php the_tags( '<div class="tags"><span>' . __("Tags:") . '</span> ', ', ', '</div>')?>
        <div id="comments"><?php comments_template()?></div>
      </div>

<?php endwhile?>