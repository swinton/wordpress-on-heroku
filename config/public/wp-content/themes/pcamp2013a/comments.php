<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Ne pas t&eacute;l&eacute;charger cette page directement, merci !');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php echo 'Prot&eacute;g&eacute; par mot de passe'; ?></h2>
<p><?php  echo 'Entrer le mot de passe pour voir les commentaires'; ?></p>

<?php return;
	}
} ?>

<!-- You can start editing here. -->

<div class="comments"><div class="all_comments">
<?php if ($comments) : ?>

<div class="img_comment"></div>

<?php wp_list_comments('callback=wpk_comment'); 
paginate_comments_links()
?>

<?php else : // this is displayed if there are no comments so far ?>

<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>

	<!-- If comments are closed. -->
<p class="nocomments">Les commentaires sont ferm&eacute;s !</p>

<hr>
	<?php endif; ?>
<?php endif; ?>

<?php

	/* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<?php if ('open' == $post->comment_status) : ?>

</div>
<div class='write_comment'>
	<h4>LEAVE A COMMENT</h4>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Vous devez &ecirc;tre <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">connect&eacute;(e)</a> pour laisser un commentaire.</p>

<?php else : ?>

<?php 
$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Send',
        // change the title of the reply section
        'title_reply'=>'',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="Comment *"></textarea></p>',

		  'fields' => apply_filters( 'comment_form_default_fields', array(

		    'author' =>
		      '<p class="comment-form-author">
		      <input id="author" name="author" type="text" aria-required="true" value="' . esc_attr( $commenter['comment_author'] ) .
		      '" placeholder="Name *"/></p>',

		    'email' =>
		      '<p class="comment-form-email">
		      <input id="email" name="email" type="text" aria-required="true" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		      '" placeholder="E-mail *"/></p>',

		    'url' =>
		      '<p class="comment-form-url">
		      <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		      '" placeholder="Website"/></p>'
		    )
		  ),
);
comment_form($comments_args); ?>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

<div class="cb"></div>
</div>

