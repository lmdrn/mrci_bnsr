<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class= "front-page-bg">
	<?php 
		$image = get_field('logo');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)
		if( $image ) {
		    echo wp_get_attachment_image( $image, $size );
		}
	<?php>
	<?php 
		$link = get_field('listen');
		if( $link ): 
		    $link_url = $link['url'];
		    $link_title = $link['title'];
		    $link_target = $link['target'] ? $link['target'] : '_self';
		    ?>
		    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
	<?php endif; ?>
</div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
