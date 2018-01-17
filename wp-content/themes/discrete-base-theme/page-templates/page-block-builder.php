<?php
/**
 * Template Name: Block Builder Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
    <?php
        while ( have_rows('block_builder') ) : the_row();
            if( get_row_layout() == 'splash_image_with_text' ) {
                if ( $splash_image_with_text == get_sub_field('splash_image_with_text' ) ) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="splash-image">
                            <?php if ( $splash_image = get_sub_field('splash_image') ):
                                echo wp_get_attachment_image( $splash_image, 'large-image-cropped', "", array( "class" => "img-responsive splash-image__image" ) ); ?>
                            <?php endif; ?>
                            <div class="splash-image__filter-dark"></div>
                            <div class="splash-image__text">
                                <h1 class="splash-image__text--header"> <?php the_sub_field('splash_title_text'); ?> </h1>
                                <h2 class="splash-image__text--description"> <?php the_sub_field('splash_description_text'); ?> </h2>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            } elseif ( get_row_layout() == 'welcome_content_box' ) { ?>
                <div class="welcome-content">
                    <?php
                    $image_layout = get_sub_field( 'welcome_content_layout_options' );
                    if ( $image_layout["welcome_content_image_layout"] == 'image_right' ) { ?>
                        <div class="row flex-row-reverse">
                    <?php } else { ?>
                        <div class="row">
                    <?php } ?>
                        <div class="col-md-4">
                            <?php if ( $welcome_content_image = get_sub_field( 'welcome_content_image' ) ) {
                                echo wp_get_attachment_image( $welcome_content_image, 'welcome-content_thumb', "", array( "class" => "img-responsive welcome-content__image" ) );
                            } ?>
                        </div>
                        <div class="col-md-8">
                            <div class="welcome-content__text" style="background-color: <?php echo $image_layout["welcome_content_background_color"] ?>">
                                <div class="rainbow-header rainbow-header__welcome-content">
                                    <?php if ( $image_layout["welcome_content_image_layout"] == 'image_left' ) { ?>
                                        <div class="welcome-content__bordered-content welcome-content__bordered-content--left">
                                    <?php } elseif ( $image_layout["welcome_content_image_layout"] == 'image_right' ) { ?>
                                        <div class="welcome-content__bordered-content welcome-content__bordered-content--right">
                                    <?php } ?>
                                        <?php if ( $welcome_content_title_text = get_sub_field( 'welcome_content_title_text' ) ) { ?>
                                                <h1 class="welcome-content__text-title"><?php the_sub_field( 'welcome_content_title_text' ); ?></h1>
                                        <?php } ?>
                                        <?php if ( $welcome_content_descriptive_text = get_sub_field( 'welcome_content_descriptive_text' ) ) { ?>
                                                <?php the_sub_field( 'welcome_content_descriptive_text' ); ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif ( get_row_layout() == 'newsletter_signup' ) { ?>
                <div class="newsletter-signup">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="newsletter-signup__religious-symbols d-flex flex-row align-items-center">
                                <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/catholicism.svg" alt="" width="34px" height="34px">
                                <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/star-of-david.svg" alt="" width="34px" height="34px">
                                <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/om.svg" alt="" width="34px" height="34px">
                                <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/buddhism.svg" alt="" width="34px" height="34px">
                                <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/sikhism.svg" alt="" width="34px" height="34px">
                                <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/build/assets/img/svg/yin-yang.svg" alt="" width="34px" height="34px">
                                <?php if ( $newsletter_signup_text = get_sub_field( 'newsletter_signup_text' )  ) { ?>
                                    <div class="newsletter-signup__text">
                                        <?php the_sub_field( 'newsletter_signup_text' ); ?>
                                    </div>
                                <?php } ?>
                                <?php if ( $newsletter_signup_text = get_sub_field( 'newsletter_signup_mailchimp_form' )  ) {
                                    echo do_shortcode( $newsletter_signup_text );
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif ( get_row_layout() == 'my_blog_posts' ) { ?>
                <div class="my-blog">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="my-blog__header" style="background-color: <?php the_sub_field( 'my_blog_background_color' ); ?>">
                                <h1>From My Blog...</h1>
                            </div>
                        </div>
                    </div>
                    <div class="my-blog__blog-posts" style="background-color: <?php the_sub_field( 'my_blog_background_color' ); ?>">
                        <div class="row d-flex">
                            <?php $post_1 = get_sub_field('my_blog_post_1');
                            if ( $post_1 ) {
                                $post = $post_1;
                                setup_postdata( $post ); ?>
                                <div class="col-md-6">
                                    <div class="my-blog__post">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php the_post_thumbnail_url( 'my-blog-thumb' ); ?>"/>
                                            <div class="my-blog__text">
                                                <h3><?php the_title(); ?></h3>
                                                    <?php the_excerpt(); ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php wp_reset_postdata();
                            } ?>
                            <?php $post_2 = get_sub_field('my_blog_post_2');
                            if ( $post_2 ) {
                                $post = $post_2;
                                setup_postdata( $post ); ?>
                                <div class="col-md-6">
                                    <div class="my-blog__post">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php the_post_thumbnail_url( 'my-blog-thumb' ); ?>"/>
                                            <div class="my-blog__text">
                                                <h3><?php the_title(); ?></h3>
                                                    <?php the_excerpt(); ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php wp_reset_postdata();
                            } ?>


                        </div>
                    </div>
                </div>
            <?php }
        endwhile;
    ?>
<?php get_footer(); ?>
