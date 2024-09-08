<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="di__container-small di__padding-basic">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
