<?php get_header(); ?>
<div>
    <h1><?php echo single_term_title(); ?></h1>
    <hr style="margin: auto; width: 50vh;" hidden>
    <?php if (category_description()) { ?>
        <?php echo category_description(); ?>
    <?php } ?>
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
          the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="container card bg-transparent mb-3">
                    <div class="row card-body">
                        <div class="col-lg-12" style="padding-bottom: 30px; border-bottom: 1px solid #daa520; margin-bottom:30px;">
                            <header>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <h2 class="post-title" style="text-transform: uppercase;
    color: goldenrod;padding: 1rem 0;font-size: 1.6rem;"><?php the_title(); ?></h2>
                                </a>
                            </header>
                            <section class="post-entry">
                                <?php if (has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <div class="text-center">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php the_content(); ?>
                                <?php custom_link_pages([
                                  "before" =>
                                    '<nav class="pagination"><ul>' . __(""),
                                  "after" => "</ul></nav>",
                                  "next_or_number" => "next_and_number", # activate parameter overloading
                                  "nextpagelink" => __("&rarr;"),
                                  "previouspagelink" => __("&larr;"),
                                  "pagelink" => "%",
                                  "echo" => 1,
                                ]); ?>
                            </section><!-- end of .post-entry -->
                        </div>
                    </div><!-- /row -->
                </div> <!-- /container -->
            </article><!-- end of #post-<?php the_ID(); ?> -->
        <?php
        endwhile; ?>
        <?php if ($wp_query->max_num_pages > 1): ?>
            <div class="container">
                <div class="row">
                    <div>
                        <hr>
                        <nav>
                            <ul class="pager">
                                <li class="previous"><?php next_posts_link(
                                  __("&#8249; Older posts", "gents")
                                ); ?></li>
                                <li class="next"><?php previous_posts_link(
                                  __("Newer posts &#8250;", "gents")
                                ); ?></li>
                            </ul><!-- end of .navigation -->
                        </nav>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <article id="post-not-found" class="hentry clearfix">
            <div class="container">
                <div class="row">
                    <div>
                        <section>
                            <p>Ainda não possuímos projetos nessa categoria, mas você pode conferir nossos outros projetos:
                            </p>
                        </section>
                        <footer>
                            <?php echo do_shortcode(
                              '[smartslider3 slider="3"]'
                            ); ?>
                        </footer>
                    </div>
                </div>
            </div>
        </article>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
