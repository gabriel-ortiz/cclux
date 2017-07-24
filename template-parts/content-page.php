<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CCL_User_Experience
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<?php
		// insert featured image if any
		if( has_post_thumbnail() ): ?>
			<figure class="featured-image full-bleed">
				<?php
					the_post_thumbnail('cclux-full-bleed');
				?>
			</figure> <!--.featured-image .full-bleed-->
	<?php endif; ?>

	<div class="entry-content post-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cclux' ),
				'after'  => '</div>',
			) );
		?>
		
	
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'cclux' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>	
	
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>	
		
	</div><!-- .entry-content -->

	<?php
		//call the page sidebar
		//alls we gotta do is append the work 'page' to call in the page sidebar
		get_sidebar( 'page' );
	?>
	
</article><!-- #post-<?php the_ID(); ?> -->
