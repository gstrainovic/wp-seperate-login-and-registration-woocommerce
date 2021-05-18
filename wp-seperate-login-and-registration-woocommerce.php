<?php

/**
 * Plugin Name:     Wp Seperate Login And Registration Woocommerce
 * Plugin URI:      https://www.strainovic-it.ch
 * Description:     Seperate the Woocommerce login and registration forms.
 * Author:          Goran Strainovic
 * Author URI:      https://www.strainovic-it.ch
 * Text Domain:     wp-seperate-login-and-registration-woocommerce
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wp_Seperate_Login_And_Registration_Woocommerce
 */

// Your code starts here.

// Thanks to https://silvawebdesigns.com/how-to-separate-login-and-registration-pages-with-woocommerce/

// [wc_reg_form_silva] on the Register Page
// [woocommerce_my_account] on the Login / My Account Page


add_shortcode('wc_reg_form_silva', 'silva_separate_registration_form');

function silva_separate_registration_form()
{
    if (is_admin()) return;
    if (is_user_logged_in()) return;
    ob_start();

    // NOTE: The following <FORM></FORM> is taken from: woocommerce\templates\myaccount\form-login.php
    // When you update the WooCommerce plugin, you may need to adjust the below accordingly

    do_action('woocommerce_before_customer_login_form');

?>
    <div id="et-main-area">

        <div id="main-content">



            <article id="post-30588" class="post-30588 page type-page status-publish hentry">


                <div class="entry-content">
                    <div class="et-l et-l--post">
                        <div class="et_builder_inner_content et_pb_gutters3">
                            <div class="et_pb_section et_pb_section_0 et_section_regular">




                                <div class="et_pb_row et_pb_row_0">
                                    <div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">


                                        <div class="et_pb_module et_pb_post_title et_pb_post_title_0 et_pb_bg_layout_light  et_pb_text_align_left">



                                            <div class="et_pb_title_container">
                                                <h1 class="entry-title">Mein Konto</h1>
                                            </div>
                                            <div class="et_pb_title_featured_container"><span class="et_pb_image_wrap"><img src="" alt="" title="Mein Konto" class="et_multi_view_hidden_image"></span></div>
                                        </div>
                                    </div> <!-- .et_pb_column -->


                                </div> <!-- .et_pb_row -->


                            </div> <!-- .et_pb_section -->
                            <div class="et_pb_section et_pb_section_1 et_section_regular">




                                <div class="et_pb_row et_pb_row_1">
                                    <div class="et_pb_column et_pb_column_2_3 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough">


                                        <div class="et_pb_module et_pb_code et_pb_code_0">


                                            <div class="et_pb_code_inner">
                                                <div class="woocommerce">
                                                    <!-- <div class="woocommerce-notices-wrapper">
                                                    <ul class="woocommerce-error" role="alert">
                                                    </ul>
                                                </div> -->
                                                    <div class="u-columns col2-set" id="customer_login">
                                                        <div class="u-column2 col-2">

                                                            <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

                                                                <?php do_action('woocommerce_register_form_start'); ?>

                                                                <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                                        <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?> <span class="required">*</span></label>
                                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                                                        ?>
                                                                    </p>

                                                                <?php endif; ?>

                                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                                    <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?> <span class="required">*</span></label>
                                                                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                                        ?>
                                                                </p>

                                                                <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                                        <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?> <span class="required">*</span></label>
                                                                        <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
                                                                    </p>

                                                                <?php else : ?>

                                                                    <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

                                                                <?php endif; ?>

                                                                <?php do_action('woocommerce_register_form'); ?>

                                                                <p class="woocommerce-FormRow form-row">
                                                                    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                                                                    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
                                                                </p>

                                                                <?php do_action('woocommerce_register_form_end'); ?>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <style type="text/css">
        .woocommerce-error,
        .woocommerce-info,
        .woocommerce-message {
            padding: 1em 2em 1em 3.5em;
            margin: 0 0 2em;
            position: relative;
            background-color: #2ea3f2;
            color: #515151;
            border-top: 3px solid #a46497;
            list-style: none outside;
            width: auto;
            word-wrap: break-word;
        }
    </style>


<?php
    return ob_get_clean();
}
