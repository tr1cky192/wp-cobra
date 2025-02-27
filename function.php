<?php
function myshop_theme_setup() {
    add_theme_support('woocommerce'); 
    add_theme_support('post-thumbnails'); 
    add_theme_support('title-tag'); 
    register_nav_menus(['primary' => 'Головне меню']);

}
add_action('after_setup_theme', 'myshop_theme_setup');
add_action('template_redirect', function() {
    if (is_cart() || is_checkout()) {
        wp_redirect(get_permalink());
        exit;
    }
});
add_action('wp_enqueue_scripts', function() {
    wp_localize_script('myshop-script', 'wc_ajax', ['url' => admin_url('admin-ajax.php')]);
});
function myshop_enqueue_assets() {
    wp_enqueue_style('myshop-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    wp_enqueue_script('myshop-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'myshop_enqueue_assets');
if (function_exists('wc_get_logger')) {
    $logger = wc_get_logger();
    $logger->debug('WooCommerce лог працює!', array('source' => 'custom-log'));
}



add_action('woocommerce_before_calculate_totals', function($cart) {
    if (is_admin() && !defined('DOING_AJAX')) return;

    error_log("🔹 Функція знижки виконується");

    foreach ($cart->get_cart() as $cart_item) {
        $product = $cart_item['data'];
        $original_price = $product->get_regular_price();

        error_log("🔸 Товар: " . $product->get_name() . " | Кількість: " . $cart_item['quantity'] . " | Початкова ціна: " . $original_price);

        if ($cart_item['quantity'] >= 3) {
            $discounted_price = $original_price * 0.90;
            $product->set_price($discounted_price);

            error_log("✅ Ціна змінена на $discounted_price");
        }
    }
}, 10);

if (function_exists('wc_get_logger')) {
    $logger = wc_get_logger();
    $logger->debug('🔹 WooCommerce лог працює!', array('source' => 'custom-log'));
}
add_action('wp_footer', function() {
    ?>
    <script>
        jQuery(function($) {
            $(document.body).on('updated_wc_div', function() {
                console.log("Оновлення кошика...");
                $(document.body).trigger('wc_update_cart');
            });
            $(document.body).trigger('wc_update_cart'); 
        });
    </script>
    <?php
});

file_put_contents(ABSPATH . 'custom_log.txt', "Функція працює \n", FILE_APPEND);

error_log("Ціна до знижки: " . $original_price);
error_log("Ціна після знижки: " . $discounted_price);