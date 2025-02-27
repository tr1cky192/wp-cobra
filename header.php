<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
</head>
<body <?php body_class(); ?>>

<header class="header">
    <div class="header-border"></div>
    <div class="container">
        <div class="header-inner">
            <h1 class="logo"><a href="<?php echo home_url(); ?>">CO.BRA</a></h1>
            <nav class="main-nav">
                <ul>
                <li class="menu-item dropdown">
                    <a href="<?php echo site_url('/shop/'); ?>">Каталог <i class="fa fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('/shop/category-1/'); ?>">Категорія 1</a></li>
                        <li><a href="<?php echo site_url('/shop/category-2/'); ?>">Категорія 2</a></li>
                        <li><a href="<?php echo site_url('/shop/category-3/'); ?>">Категорія 3</a></li>
                    </ul>
                </li>

                    <li><a href="<?php echo site_url('/gifts/'); ?>">Подарунки</a></li>
                    <li><a href="<?php echo site_url('/about/'); ?>">Про нас</a></li>
                    <li><a href="<?php echo site_url('/sale/'); ?>">О&a</a></li>
                    <li><a href="<?php echo site_url('/contact/'); ?>">Контакти</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <a href="#"><i class="fas fa-search"></i></a>
                <?php if (class_exists('WooCommerce')) : ?>
                <a href="<?php echo esc_url(wc_get_page_permalink('cart')); ?>" class="cart-icon">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="header-border bottom"></div>
</header>
