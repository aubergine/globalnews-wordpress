<?php
/*------------------------------------------------------------------------
# Global News WordPress Theme v1.1 - August 2012
# ------------------------------------------------------------------------
# Copyright (C) 2008 instantShift. All Rights Reserved.
# @license - Global News WordPress Theme is available under the terms of the GNU General Public License.
# Author: http://www.rapidxhtml.com
# Websites:  http://www.instantshift.com
-------------------------------------------------------------------------*/

  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die (__('Please do not load this page directly. Thanks!', 'globalnews'));

  if ( post_password_required() ): ?>
    <p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'globalnews') ?></p>
  <?php
    return;
    endif;
  ?>

    <h3><?php printf("%s to &#8220;%s&#8221;", comments_number(), the_title()) ?></h3>

    <?php if ( have_comments() ) : ?>
    <div class="navigation">
      <div class="alignleft"><?php previous_comments_link() ?></div>
      <div class="alignright"><?php next_comments_link() ?></div>
    </div>

    <ol class="commentlist">
      <?php wp_list_comments()?>
    </ol>

    <div class="navigation">
      <div class="alignleft"><?php previous_comments_link() ?></div>
      <div class="alignright"><?php next_comments_link() ?></div>
    </div>
    <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
      <!-- If comments are open, but there are no comments. -->
      <center><a href="#respond" title="<?php _e("Add a comment") ?>"><h6><?php _e("add a comment.", 'globalnews') ?></h6></a></center>

     <?php else : // comments are closed ?>
      <!-- If comments are closed. -->
      <p class="nocomments"><?php _e("Comments are closed.", 'globalnews') ?></p>

    <?php endif?>
  <?php endif?>


  <?php if ('open' == $post->comment_status) : ?>

  <div id="respond">

    <h3><?php comment_form_title() ?></h3>
    <div class="cancel-comment-reply">
      <?php cancel_comment_reply_link()?>
    </div>

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
      <?php $logInUrl = get_option('siteurl') . "/wp-login.php?redirect_to=" . urlencode(get_permalink()) ?>
    <p><?php _e('You must be <a href="%s">logged in</a> to post a comment.', 'globalnews') ?></p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl')?>/wp-comments-post.php" method="post" id="commentform">

    <?php if ( $user_ID ) : ?>

    <p>Logged in as <a href="<?php echo get_option('siteurl')?>/wp-admin/profile.php"><?php echo $user_identity?></a>. <a href="<?php echo wp_logout_url(get_permalink())?>" title="<?php _e("Log out of this account") ?>"><?php _e("Log out &raquo;", 'globalnews') ?></a></p>

    <?php else : ?>

    <p><label for="author"><?php _e("Name", 'globalnews') ?> <?php if ($req) _e("(required)", 'globalnews') ?></label><br />
    <input type="text" name="author" id="author" value="<?php echo $comment_author?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"?> /></p>

    <p><label for="email"><?php _e("Mail (will not be published)", 'globalnews') ?> <?php if ($req) _e("(required)", 'globalnews') ?></label><br />
    <input type="text" name="email" id="email" value="<?php echo $comment_author_email?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"?> /></p>

    <p><label for="url"><?php _e("Website", 'globalnews') ?></label><br />
    <input type="text" name="url" id="url" value="<?php echo $comment_author_url?>" size="22" tabindex="3" /></p>

    <?php endif?>

    <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags()?></code></small></p>-->

    <p><label for="comment"><?php _e("Message", 'globalnews') ?></label><br />
    <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

    <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Submit Comment", 'globalnews') ?>" />
    <?php comment_id_fields()?>
    </p>
    <?php do_action('comment_form', $post->ID)?>

    </form>

    <?php endif; // If registration required and not logged in ?>
  </div>

<?php endif; // if you delete this the sky will fall on your head ?>
