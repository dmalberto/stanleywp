<?php get_header(); ?>
<?php
global $more;
$more = 0;
?>
<?php
global $wp_query;
if (get_query_var("paged")) {
    $paged = get_query_var("paged");
} elseif (get_query_var("page")) {
    $paged = get_query_var("page");
} else {
    $paged = 1;
}
query_posts(["post_type" => "post", "paged" => $paged]);
?>
<?php while (have_posts()):
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div id="<?php echo $color_id; ?>">
            <div class="container">
                <div class="row">
                    <div class="">
                        <header>
                            <h2 class="post-title"><a href="<?php
                            the_permalink();
                            the_title();
                            ?></a></h2>
                        </header>
                        <section class=" post-entry">
                                    <?php if (has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php the_content(); ?>
                                    <?php custom_link_pages([
                                        "before" =>
                                            '<nav class="pagination"><ul>' .
                                            __(""),
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
        </div>
    </article><!-- end of #post-<?php the_ID(); ?> -->
<?php
endwhile; ?>
<?php if ($wp_query->max_num_pages > 1): ?>
    <div class="container">
        <div class="row">
            <div class="">
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
</div> <!-- /col-lg-8 -->
<?php get_footer(); ?>
