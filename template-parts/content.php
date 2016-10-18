<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Running_with_Grass
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php
		if ( has_post_thumbnail() ) { ?>
				<figure class="featured-image">
					<?php the_post_thumbnail(); ?>
				</figure>
		<?php } ?>
		
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title index-excerpt"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		if ( has_excerpt( $post->ID ) ) {
			echo '<div class="deck">';
			echo '<p>' . get_the_excerpt() . '</p>';
			echo '</div><!-- .deck -->';
		}
		
		if ( 'post' === get_post_type() ) : ?>
			<?php if ( is_single() ) { ?>
				<div class="entry-meta"><?php running_grass_posted_on(); ?> </div>
			<?php } else { ?>
				<div class="index-entry-meta"><?php running_grass_index_posted_on(); ?> </div>
			<?php } ?>
		<!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() || is_category() || is_archive() ) {
			the_excerpt();
		} else {
			the_content( sprintf(
						
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'running-grass' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'running-grass' ),
				'after'  => '</div>',
			) ); }
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php running_grass_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
