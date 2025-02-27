<?php
/**Template name: Home page 
 * 
*/
?>
<?php get_header(); ?>

<div class="hero-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/bc.png');">
    <div class="hero-content">
        <h1>ДОДАВАЙ РІЗНІ МОДЕЛІ ТРУСИКІВ ВІД 3Х ОДИНИЦЬ З ВИГОДОЮ ДО 44%</h1>
        <a href="#" class="hero-button">ОБРАТИ НАБОРИ</a>
    </div>
</div>

<div class="bestsellers-section">
    <div class="container">
        <h2 class="section-title">БЕСТСЕЛЕРИ</h2>
        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="view-all">Дивитись всі →</a>
        <div class="bestsellers-slider">
            <?php
            $bestsellers = new WP_Query(array(
                'post_type'      => 'product',
                'posts_per_page' => 5,
                'meta_key'       => 'total_sales',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC'
            ));

            if ($bestsellers->have_posts()) :
                while ($bestsellers->have_posts()) : $bestsellers->the_post();
                    global $product;
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); 
                    if (!$image_url) {
                        $image_url = wc_placeholder_img_src();
                    }
                    ?>
                    <div class="product-card">
                        <div class="discount-badge">Заощаджуйте 44%</div>
                        <a href="<?php the_permalink(); ?>" class="product-image">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                        </a>
                        <div class="product-info">
                            <h3 class="product-title"><?php the_title(); ?></h3>
                            <p class="product-brand">«<?php echo get_the_title(); ?>»</p>
                            <span class="product-price"><?php echo wc_price($product->get_regular_price()); ?></span>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>







