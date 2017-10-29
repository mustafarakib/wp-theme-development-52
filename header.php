<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Stock
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <?php
    $header_iconic_boxes = cs_get_option('header_iconic_boxes');
    $enable_image_logo = cs_get_option('enable_image_logo');
    $image_logo = cs_get_option('image_logo');
    $image_logo_max_height = cs_get_option('image_logo_max_height');
    $text_logo = cs_get_option('text_logo');

    $enable_preloader = cs_get_option('enable_preloader');
    $enable_boxed_layout = cs_get_option('enable_boxed_layout');

    $head_script = cs_get_option('head_script');
    $body_start_script = cs_get_option('body_start_script');

    wp_head(); echo $head_script; ?>
</head>

<body <?php body_class(); ?>>

<?php echo $body_start_script; ?>

<?php if($enable_preloader == true):?>
    <script>
        jQuery(window).load(function(){
            jQuery(".preloader-wrapper").fadeOut();
        })
    </script>
    <div class="preloader-wrapper">
        <div class="loader">Loading...</div>
    </div>
<?php endif;?>

<div id="page" class="site<?php if($enable_boxed_layout == true) : ?> stock-boxed-layout <?php endif; ?>">

	<div class="header-area">
		<div class="container">

			<div class="row">
				<div class="col-md-3">
					<div class="site-logo">
                        <h2>
                            <a href="<?php esc_url(home_url('/')); ?>">

                                <?php if($enable_image_logo == true && !empty($image_logo)) :
                                    $image_logo_src = wp_get_attachment_image_src($image_logo, 'large', false) ; ?>

                                        <img style="max-height:<?php echo esc_attr($image_logo_max_height); ?>px"
                                             src="<?php echo esc_url($image_logo_src[0]); ?>"
                                             alt="<?php echo esc_html(bloginfo('name')); ?>">

                                <?php else : ?>

                                    <?php
                                        if(!empty($text_logo)) {
                                            echo esc_html($text_logo);
                                        } else {
                                            echo esc_html(bloginfo('name'));
                                        }
                                    ?>

                                <?php endif; ?>
                            </a>
                        </h2>
					</div>					
				</div>

				<div class="col-md-9">
                    <div class="header-right-content">

                        <?php if( !empty( $header_iconic_boxes )) : ?>
                            <?php foreach($header_iconic_boxes as $box) : ?>

                                    <?php if(!empty($box['link'])) : ?>
                                <a href="mailto:contact@stock.com"
                                    <?php else : ?><div
                                    <?php endif; ?>
                                                class="stock-contact-box">

                                        <i class="<?php echo esc_attr($box['icon']); ?>"></i>
                                        <?php echo esc_html($box['title']); ?>
                                        <h3><?php echo esc_html($box['big_title']); ?></h3>

                                    <?php if(!empty($box['link'])) : ?>
                                </a>
                                    <?php else : ?></div>
                                    <?php endif; ?>

                            <?php endforeach; ?>
                        <?php endif; ?>

                        <a href="" class="stock-cart"><i class="fa fa-shopping-cart"></i>
                        <span class="stock-cart-count">3</span></a>
                    </div>
				</div>
			</div>

            <div class="row">
                <div class="col-md-12">
                    <div class="stock-responsive-menu"></div>
                    <div class="mainmenu">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'menu-main-menu',
                        ) );
                        ?>
                    </div>
                </div>
            </div>

		</div>
	</div>
