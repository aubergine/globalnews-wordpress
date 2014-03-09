<?php if ( have_posts() ) while ( have_posts() ) : the_post()?>

      <div class="post" id="post-<?php the_ID()?>">
        <h1><a href="<?php the_permalink() ?>" title="<?php the_title()?>"><?php the_title()?></a></h1>
        <p class="postmetadata">
            <span><?php printf(__("Posted by %s", the_author_posts_link())) ?></span>
            <?php printf(__("Posted on %s", the_time('l, F jS, Y'))) ?></p>
        <?php if(has_post_thumbnail()) { ?><div class="post_image"><a href="<?php echo get_post_meta($post->ID, "thumb", $single = true)?>" title="<?php the_title()?>"><?php the_post_thumbnail('medium') ?></a></div><?php } ?>
        <div class="post_entry"><?php the_content('')?></div>
        <?php the_tags( '<div class="tags"><span>' .  __("Tags:") . '</span> ', ', ', '</div>')?>
        <div id="comments"><?php comments_template()?></div>
      </div>

<?php endwhile?>