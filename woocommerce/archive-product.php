<?php get_header(); ?>
<div class="products-container">
    <?php if (have_posts()) : ?>
        <ul class="products">
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <h2><?php the_title(); ?></h2>
                        <span><?php echo wc_price(get_post_meta(get_the_ID(), '_price', true)); ?></span>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
