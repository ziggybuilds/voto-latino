<?php
/**
 * Template part for displaying posts on archive page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package je-starter
 */

?>

<article id="post-<?php the_ID(); ?>" class="post-article single-card">
	<a href="<?php the_permalink(); ?>">
	<div class="post-title card-title">
		<?php
			echo '<h3 class="post-title">' . get_the_title() . '</h3>';

			echo '<div class="posted-on"><p>Posted on</p><p class="post-date">' . get_the_date() . '</p></div>';
		?>
	</div><!-- .entry-header -->

	<div class="post-excerpt card-content">
		<?php
		the_excerpt();
		?>
	</div><!-- .entry-content -->
	</a>
</article><!-- #post-## -->