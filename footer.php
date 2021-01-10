<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'edumark' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( edumark_opt( 'edumark_footer_copyright_text' ) ) ? edumark_opt( 'edumark_footer_copyright_text' ) : $copyText;
    $footer_class = edumark_opt( 'edumark_footer_widget_toggle' ) == 1 ? 'footer-area' : 'no_widget';

    ?>

    <!-- footer -->
    <footer class="footer footer_bg_1">
        <?php
        if( edumark_opt( 'edumark_footer_widget_toggle' ) == 1 ) {
            ?>
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <?php
                            // Footer Widget 1
                            echo '<div class="col-xl-4 col-md-6 col-lg-4">';
                                echo edumark_theme_logo('footer-logo');
                                if ( is_active_sidebar( 'footer-1' ) ) {
                                    dynamic_sidebar( 'footer-1' );
                                }
                            echo '</div>';

                            // Footer Widget 2
                            if ( is_active_sidebar( 'footer-2' ) ) {
                                dynamic_sidebar( 'footer-2' );
                            }

                            // Footer Widget 3
                            if ( is_active_sidebar( 'footer-3' ) ) {
                                dynamic_sidebar( 'footer-3' );
                            }

                            // Footer Widget 4
                            if ( is_active_sidebar( 'footer-4' ) ) {
                                dynamic_sidebar( 'footer-4' );
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        } 
        ?>

        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <?php echo wp_kses_post( $copyRight ); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->

    <?php wp_footer(); ?>
    </body>
</html>