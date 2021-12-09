<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <?php
                                    echo edumark_theme_logo( 'navbar-brand' );
                                ?>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <?php
                                    if(has_nav_menu('primary-menu')) {
                                        wp_nav_menu(array(
                                            'menu'           => 'primary-menu',
                                            'theme_location' => 'primary-menu',
                                            'menu_id'        => 'navigation',
                                            'container_class'=> false,
                                            'container_id'   => false,
                                            'menu_class'     => false,
                                            'walker'         => new edumark_bootstrap_navwalker,
                                            'depth'          => 3
                                        ));
                                    }
                                    ?>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <?php
                                if ( edumark_opt('edumark_login_toggle') == true ) {
                                    if ( ! is_user_logged_in() ) {
                                        $login_url = wp_login_url( get_permalink() );
                                        ?>
                                        <a href="<?php echo esc_url( $login_url )?>" class="login">
                                            <i class="flaticon-user"></i>
                                            <span><?php _e( 'log in', 'edumark' )?></span>
                                        </a>
                                        <?php
                                    } else {
                                        $user_obj         = wp_get_current_user();
                                        $user_profile_url = get_edit_profile_url();
                                        ?>
                                        <a href="<?php echo esc_url( $user_profile_url )?>" class="login">
                                            <i class="flaticon-user"></i>
                                            <span><?php echo esc_html( $user_obj->user_login )?></span>
                                        </a>
                                        <?php
                                    }
                                }    

                                if ( edumark_opt('edumark_phone_number_toggle') == true ) {
                                    $edumark_phone_number = edumark_opt('edumark_phone_number');
                                    ?>
                                    <div class="live_chat_btn">
                                        <a class="boxed_btn_orange" href="tel:<?php echo esc_html( $edumark_phone_number )?>">
                                            <i class="fa fa-phone"></i>
                                            <span><?php echo esc_html( $edumark_phone_number )?></span>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <?php
    //Page Title Bar
    if ( ! is_singular( 'course' ) ) {
        if( function_exists( 'edumark_page_titlebar' ) ){
            edumark_page_titlebar();
        }
    }

