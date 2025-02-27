<?php
function myshop_theme_setup() {
    add_theme_support('woocommerce'); 
    add_theme_support('post-thumbnails'); 
    add_theme_support('title-tag'); 
    register_nav_menus(['primary' => 'Головне меню']);

}
add_action('after_setup_theme', 'myshop_theme_setup');

function myshop_enqueue_assets() {
    wp_enqueue_style('myshop-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
    wp_enqueue_script('myshop-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'myshop_enqueue_assets');
add_action('woocommerce_cart_calculate_fees', function($cart) {
    $count = 0;
    foreach ($cart->get_cart() as $cart_item) {
        $count += $cart_item['quantity'];
    }
    if ($count >= 3) {
        $discount = $cart->subtotal * 0.10;
        $cart->add_fee('Знижка 10% при купівлі 3+ товарів', -$discount);
    }
});
