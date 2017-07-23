<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CCL_User_Experience
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
		//calls the full bleed featured image if exists
		if( has_post_thumbnail() ): ?>
	
		<figure class="featured-image  index-image">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php
				//insert the post thumbnail
				//'cclux-index-img' full-bleed
				the_post_thumbnail('cclux-index-img');
				?>
			</a>
		</figure>
		
	<?php endif; ?>

	
	<div class="post__content">
		<header class="entry-header">
			
			<?php cclux_the_category_list(); ?>
			
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
	
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php cclux_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			// the_content( sprintf(
			// 	wp_kses(
			// 		/* translators: %s: Name of current post. Only visible to screen readers */
			// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cclux' ),
			// 		array(
			// 			'span' => array(
			// 				'class' => array(),
			// 			),
			// 		)
			// 	),
			// 	get_the_title()
			// ) );
			
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cclux' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<div class="continue-reading">
			<?php
				$read_more_link = sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cclux' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			);
			?>		
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $read_more_link; ?></a>
		
	</div><!--.continue-reading-->
	
</div> <!--.post__content-->
	<!--<footer class="entry-footer">-->
	<?php// cclux_entry_footer(); ?>
	<!--</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
