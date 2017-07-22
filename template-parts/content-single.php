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
	<header class="entry-header">
		
		<?php cclux_the_category_list(); ?>
		
		<?php
		//check if post is single
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
		

		<?php 
			//test if sidebar exists, then insert entry meta content
			if ( is_active_sidebar('sidebar-1') ) : ?>

			<div class="entry-meta">
				
				<?php cclux_posted_on(); ?>
				
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->
	
	
	<?php
		if( has_post_thumbnail() ): ?>
	
		<figure class="featured-image full-bleed">
			<?php
			//insert the post thumbnail
			the_post_thumbnail('cclux-full-bleed');
			?>
		</figure>
		
		<?php endif; ?>

<section class="post-content">
	
	<?php 
		//if sidebar is inative, insert entry meta into post-content
		if ( !is_active_sidebar('sidebar-1') ) : ?>
		<div class="post-content__wrap">
			
			<div class="entry-meta">
				<?php cclux_posted_on(); ?>
			</div><!-- .entry-meta -->
			
			<div class="post-content__body">
			
	<?php endif; ?>
	
		<div class="entry-content">
			<?php
				the_content( sprintf(
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
				) );
	
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cclux' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->


	<footer class="entry-footer">
		<?php cclux_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<?php 
		//close the divs if side-bar does not exists
		if ( !is_active_sidebar('sidebar-1') ) : ?>
		</div> <!--.post-content__body-->
		</div> <!--.post-content__wrap-->
	<?php endif; ?>

	
	<?php
	
		cclux_post_navigation();	

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
	
	</section><!-- .post-content -->	
	

	<?php

		get_sidebar();

	?>
	
</article><!-- #post-<?php the_ID(); ?> -->
