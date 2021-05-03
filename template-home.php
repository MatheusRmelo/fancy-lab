<?php
/*
Template Name: Home Page
*/
?>
<?php 
/**
 * The template for displaying image attachments
 *
 * @package Fancy Lab
 */

get_header();
?>
    <div class="content-area">
        <main>
            <section class="slider">
                <!-- Place somewhere in the <body> of your page -->
                <div class="flexslider">
                    <ul class="slides">
                        <?php 
                        for($i=1;$i<4;$i++){
                            $slider_page[$i] = get_theme_mod('set_slider_page'.$i);
                            $slider_button_text[$i] = get_theme_mod('set_slider_button_text'.$i);
                            $slider_button_url[$i] = get_theme_mod('set_slider_button_url'.$i);
                        }
                        $args = array(
                            'post_type'         => 'page',
                            'posts_per_page'    => 3,
                            'post__in'          => $slider_page,
                            'orderby'           => 'post__in',
                        );

                        $slider_loop = new WP_Query($args);

                        $j = 1;

                        if( $slider_loop->have_posts()):
                            while( $slider_loop->have_posts()):
                                $slider_loop->the_post();
                        ?>
                         <li>
                            <?php the_post_thumbnail('fancy_lab_slider', array('class'=>'img-fluid')); ?>
                            <div class="container">
                                <div class="slider-details-container">
                                    <div class="slider-title">
                                        <h1><?php the_title(); ?></h1>
                                    </div>
                                    <div class="slider-description">
                                        <div class="subtitle"><?php the_content(); ?></div>
                                        <a href="<?= $slider_button_url[$j]; ?>" class="link"><?= $slider_button_text[$j]; ?></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                            $j++;
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                       
                    </ul>
                </div>
            </section>
            <section class="popular-products">
                <div class="container">
                    <div class="row">Produtos populares</div>
                </div>
           </section>
            <section class="new-arrivals">
                <div class="container">
                    <div class="row">Lançamentos</div>
                </div>
            </section>
            <section class="deal-of-the-week">
                <div class="container">
                    <div class="row">Promoção da semana</div>
                </div>
            </section>
            <section class="lab-blog">
                <div class="container">
                    <div class="row">
                        <?php
                            if(have_posts()):
                                while(have_posts()): the_post();
                                ?>
                                    <article>
                                        <h2><?php the_title(); ?></h2>
                                        <div><?php the_content(); ?></div>
                                    </article>
                                <?php
                                endwhile;
                            else: 
                                ?>
                                <p>Nothing to display.</p>
                                <?php 
                            endif;
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php get_footer(); ?>

    