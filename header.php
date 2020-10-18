<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since 1.0.0.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'edxstarter' ); ?></a>

            <header id="site-header" role="banner" class="site-header <?php echo is_singular() ? 'is-singular' : 'is-archive'; ?>">

                <div class="site-header-top">
                    <div class="site-header-top-left">
                        <!-- Social Nav / Login? -->
                        <?php
                        if ( has_nav_menu( 'social' ) ) {
                            wp_nav_menu(array(
                                'theme_location'    => 'social',
                                'container'         => 'div',
                                'container_id'      => 'menu-social',
                                'container_class'   => 'menu',
                                'menu_id'           => 'menu-social-items',
                                'menu_class'        => 'menu_items',
                                'depth'             => 1,
                                'link_before'       => '<span class="screen-reader-text">',
                                'link_after'        => '</span>',
                                'fallback_cb'       => '',
                            ));
                        }
                        ?>
                        <?php if ( ! is_user_logged_in() ) { ?>
                            <a class="site-admin-link site-login" href="<?php echo esc_url( wp_login_url() ); ?>">
                                Login
                            </a>
                        <?php } else { ?>
                            <a class="site-admin-link site-logout" href="<?php echo esc_url( wp_logout_url() ); ?>">
                                Logout
                            </a>
                        <?php } ?>
                    </div><!-- .site-header-top-left -->

                    <div class="site-header-top-center">
                        <div class="site-branding">
                            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
                                <a class="site-logo" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>">
                                    <?php the_custom_logo(); ?>
                                </a>
                            <?php } ?>

                            <div class="site-identity">
                                <a class="site-title-link" href="<?php echo esc_url ( get_bloginfo( 'url' ) ); ?>">
                                    <h1 class="site-title">
                                        <?php echo esc_attr ( get_bloginfo( 'name' ) ); ?>
                                    </h1>
                                </a>
                                <p class="site-description"><?php echo esc_attr ( get_bloginfo( 'description' ) ); ?>
                            </div><!-- .site-identity -->
                        </div><!-- .site-branding -->

                    </div><!-- .site-header-top-center -->

                    <div class="site-header-top-right">

                        <!-- Search -->
                        <?php get_search_form(); ?>

                    </div><!-- .site-header-top-right -->

                </div><!-- .site-header-top -->

                <nav class="site-navigation" aria-label="<?php esc_attr_e ( 'Header Menu', 'edxstarter' ); ?>" role="navigation">

                    <!-- Main Nav -->
                    <ul class="header-menu">
                        <?php
                        if ( has_nav_menu ( 'header' ) ) {
                            wp_nav_menu(array(
                                'container'         => '',
                                'items_wrap'        => '%3$s',
                                'theme_location'    => 'header',
                            ));
                        } else {
                            wp_list_pages(array(
                                'match_menu_classes'    => true,
                                'show_sub_menu_icons'   => true,
                                'title_li'              => false,
                            ));
                        }
                        ?>
                    </ul>

                </nav><!-- .site-navigation -->

            </header><!-- Header -->
            <?php
            