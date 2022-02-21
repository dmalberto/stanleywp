<?php
?>
<?php get_header(); ?>

<div id="content">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <h1><?php the_title(); ?></h1>

                    <section class="post-entry">
                        <?php the_content(); ?>


                        <?php custom_link_pages(
                            array(
                                'before' => '<nav class="pagination"><ul>' . __(''),
                                'after' => '</ul></nav>',
                                'next_or_number' => 'next_and_number', // activate parameter overloading
                                'nextpagelink' => __('&rarr;'),
                                'previouspagelink' => __('&larr;'),
                                'pagelink' => '%',
                                'echo' => 1
                            )
                        ); ?>


                    </section><!-- end of .post-entry -->

                    <footer class="article-footer">
                        <?php if (bi_get_data('enable_disable_tags', '1') == '1') { ?>
                            <div class="post-data">
                                <?php the_tags(__('TAGS:', 'gents') . ' ', ' - ', '<br />'); ?>
                            </div><!-- end of .post-data -->
                        <?php } ?>

                        <div class="post-edit"><?php edit_post_link(__('Edit', 'gents')); ?></div>
                    </footer>
                </div>
            </div>
        </div>
    </article><!-- end of #post-<?php the_ID(); ?> -->

    <div class="container">
        <div class="row">
            <div>

                <?php comments_template('', true); ?>

            </div>
        </div>
    </div>

</div><!-- end of #content -->



<?php get_footer(); ?>