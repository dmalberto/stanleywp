<?php get_header(); ?>
<div id="grey">
	
      <div class="row mt">
        <div class="col-lg-6 col-lg-offset-3 centered">
           <h1 style="font-size: 50px;"><?php echo single_term_title(); ?></h1>
           <hr>
           <?php if(category_description()) { ?>
           <?php echo category_description( ); ?>
           <?php } ?>
       </div>
   </div>


    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="padding-bottom: 30px; border-bottom: 1px solid #daa520; margin-bottom:30px;">
                            <header>
                                <h2 class="post-title" style="font-size: 35px;margin-bottom: 50px;margin-top: 50px;text-align: center;"><?php the_title(); ?></h2>
                            </header>
                            <section class="post-entry">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <div class="text-center">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php the_content(); ?>

                                <?php custom_link_pages(
                                    array(
                                        'before' => '<nav class="pagination"><ul>' . __(''),
                                        'after' => '</ul></nav>',
                                        'next_or_number' => 'next_and_number', # activate parameter overloading
                                        'nextpagelink' => __('&rarr;'),
                                        'previouspagelink' => __('&larr;'),
                                        'pagelink' => '%',
                                        'echo' => 1
                                    )
                                ); ?>

                            </section><!-- end of .post-entry -->

                        </div>

                    </div><!-- /row -->
                </div> <!-- /container -->



            </article><!-- end of #post-<?php the_ID(); ?> -->


        <?php endwhile; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="container">

                <div class="row">
                    <div>
                        <hr>
                        <nav>
                            <ul class="pager">
                                <li class="previous"><?php next_posts_link(__('&#8249; Older posts', 'gents')); ?></li>
                                <li class="next"><?php previous_posts_link(__('Newer posts &#8250;', 'gents')); ?></li>
                            </ul><!-- end of .navigation -->
                        </nav>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php else : ?>

        <article id="post-not-found" class="hentry clearfix">
            <div class="container">
                <div class="row">
                    <div>
                        <section>
                            <p>Ainda não possuímos projetos nessa categoria, mas você pode conferir nossos outros projetos:</p>
                        </section>
                        <footer>
                            				<?php
						echo do_shortcode('[smartslider3 slider="3"]');
						?>
                        </footer>
                    </div>
                </div>
            </div>
        </article>

    <?php endif; ?>


</div>

<?php get_footer(); ?>