<?php
//REMOVE GUTENBERG BLOCK LIBRARY CSS FROM LOADING ON FRONTEND
function remove_wp_block_library_css()
{
    wp_dequeue_style("wp-block-library");
    wp_dequeue_style("wp-block-library-theme");
    wp_dequeue_style("wc-block-style"); // REMOVE WOOCOMMERCE BLOCK CSS
    wp_dequeue_style("global-styles"); // REMOVE THEME.JSON
}
//add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );
// set a variable to make it easy to enable and disable the purifycss feature
// while testing, just append this parameter to your url: http://www.yourwebsite.com/?purifytest
$purifyCssEnabled = array_key_exists("purifytest", $_GET);
// when you're done, set the variable to true - you will be able to disable it anytime with just one change
// $purifyCssEnabled = true;
function dequeue_all_styles()
{
    global $wp_styles;
    foreach ($wp_styles->queue as $style) {
        wp_dequeue_style($wp_styles->registered[$style]->handle);
    }
}
function enqueue_pure_styles()
{
    $suffix = "";
    if (is_front_page()) {
        $suffix = ".home";
    } elseif (is_page()) {
        $suffix = "";
    } elseif (is_single()) {
        $suffix = "";
    } elseif (is_archive()) {
        $suffix = "";
    }
    wp_enqueue_style(
        "pure-styles",
        get_stylesheet_directory_uri() . "/styles" . $suffix . ".pure.css"
    );
}
function start_html_buffer()
{
    // buffer output html
    ob_start();
}
function end_html_buffer()
{
    // get buffered HTML
    $wpHTML = ob_get_clean();
    // remove <style> blocks using regular expression
    $wpHTML = preg_replace(
        "/<style(?!.*?\bid='inline')[^>]*>[^<]*<\/style>/m",
        "",
        $wpHTML
    );
    echo $wpHTML;
}
function end_html_buffer2()
{
    // get buffered HTML
    $wpHTML = ob_get_clean();
    // remove <style> blocks using regular expression
    $wpHTML = preg_replace(
        "/<link(?![^>]*\bid=['\"]?pure-home-styles-css['\"]?)[^>]*\brel=['\"]stylesheet['\"][^>]*>/m",
        "",
        $wpHTML
    );
    echo $wpHTML;
}
add_filter("jetpack_implode_frontend_css", "__return_false", 99);
if ($purifyCssEnabled) {
    // this will remove all enqueued styles in head
    add_action("wp_print_styles", "dequeue_all_styles", PHP_INT_MAX - 1);
    add_action("template_redirect", "start_html_buffer", 0); // wp hook just before the template is loaded
    add_action("wp_footer", "end_html_buffer", 98); // wp hook after wp_footer()
    add_action("wp_footer", "end_html_buffer2", 97); // wp hook after wp_footer()
    add_filter("jetpack_implode_frontend_css", "__return_false", 99);
    add_action("wp_print_styles", "enqueue_pure_styles", PHP_INT_MAX);
} else {
    function bootstrap_styles()
    {
        wp_register_style(
            "bootstrap",
            get_template_directory_uri() . "/css/bootstrap.min.css",
            false,
            "3.0.3"
        );
        wp_register_style(
            "wpbase",
            get_template_directory_uri() . "/css/wpbase.min.css",
            false,
            "3.0.3"
        );
        wp_register_style("theme-style", get_stylesheet_uri(), false, "3.0.3");
        //  enqueue the style:
        wp_enqueue_style("bootstrap");
        wp_enqueue_style("wpbase");
        wp_enqueue_style("theme-style");
    }
    add_action("wp_enqueue_scripts", "bootstrap_styles");
}
function bootstrap_scripts()
{
    // Register the scripts for this theme:
    //   wp_register_script( 'bootstrap-script', ( 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js' ), false, null, true );
    wp_register_script(
        "bootstrap-script",
        get_template_directory_uri() . "/js/bootstrap.js",
        ["jquery"]
    );
    wp_register_script(
        "hover-script",
        get_template_directory_uri() . "/js/hover.zoom.js",
        ["jquery"]
    );
    wp_register_script(
        "main-script",
        get_template_directory_uri() . "/js/main.js",
        ["jquery"]
    );
    //  enqueue the script:
    wp_enqueue_script("bootstrap-script");
    // wp_enqueue_script('hover-script');
    // wp_enqueue_script('main-script');
}
add_action("wp_enqueue_scripts", "bootstrap_scripts");
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style("wp-block-library");
    wp_dequeue_style("wp-block-library-theme");
    wp_dequeue_style("wc-blocks-style");
}
?>
<?php // Custom Bootstrap Menu


add_action("after_setup_theme", "bootstrap_setup");
if (!function_exists("bootstrap_setup")):
    function bootstrap_setup()
    {
        add_action("init", "register_menu");
        function register_menu()
        {
            register_nav_menu("top-bar", "Top Menu");
        }
    }
endif;
?>
<?php // Put post thumbnails into rss feed


function wpfme_feed_post_thumbnail($content)
{
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $content = "" . $content;
    }
    return $content;
}
add_filter("the_excerpt_rss", "wpfme_feed_post_thumbnail");
add_filter(
    "the_content_feed",

    "wpfme_feed_post_thumbnail"
);
?>
<?php // Custom Pagination


function custom_link_pages($args = "")
{
    $defaults = [
        "before" => "<li>" . __("Pages:"),
        "after" => "</li>",
        "link_before" => "",
        "link_after" => "",
        "next_or_number" => "number",
        "nextpagelink" => __("Next page"),
        "previouspagelink" => __("Previous page"),
        "pagelink" => "%",
        "echo" => 1,
    ];
    $r = wp_parse_args($args, $defaults);
    $r = apply_filters("wp_link_pages_args", $r);
    extract($r, EXTR_SKIP);
    global $page, $numpages, $multipage, $more, $pagenow;
    $output = "";
    if ($multipage) {
        if ("number" == $next_or_number) {
            $output .= $before;
            for ($i = 1; $i < $numpages + 1; $i = $i + 1) {
                $j = str_replace("%", $i, $pagelink);
                $output .= " ";
                if ($i != $page || (!$more && $page == 1)) {
                    $output .= "<li>" . _wp_link_page($i);
                } elseif ($i == $page) {
                    $output .= '<li><a href="#">';
                }
                $output .= $link_before . $j . $link_after;
                if ($i != $page || $i == $page || (!$more && $page == 1)) {
                    $output .= "</a></li>";
                }
            }
            $output .= $after;
        } else {
            if ($more) {
                $output .= $before;
                $i = $page - 1;
                if ($i && $more) {
                    $output .= _wp_link_page($i);
                    $output .=
                        $link_before .
                        $previouspagelink .
                        $link_after .
                        "</a></li>";
                }
                $i = $page + 1;
                if ($i <= $numpages && $more) {
                    $output .= _wp_link_page($i);
                    $output .=
                        $link_before .
                        $nextpagelink .
                        $link_after .
                        "</a></li>";
                }
                $output .= $after;
            }
        }
    }
    if ($echo) {
        echo $output;
    }
    return $output;
} // Custom Next/Previous Page
add_filter("wp_link_pages_args", "wp_link_pages_args_prevnext_add"); /**
 * Add prev and next links to a numbered link list
 */
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;
    if (!$args["next_or_number"] == "next_and_number") {
        return $args;
    } # exit early
    $args["next_or_number"] = "number"; # keep numbering for the main part
    if (!$more) {
        return $args;
    } # exit early
    if ($page - 1) {
        # there is a previous page
        $args["before"] .=
            "<li>" .
            _wp_link_page($page - 1) .
            $args["link_before"] .
            $args["previouspagelink"] .
            $args["link_after"] .
            "</a></li>";
    }
    if ($page < $numpages) {
        # there is a next page
        $args["after"] =
            "<li>" .
            _wp_link_page($page + 1) .
            $args["link_before"] .
            $args["nextpagelink"] .
            $args["link_after"] .
            "</a></li>" .
            $args["after"];
    }
    return $args;
}
?>
<?php // make tags into a bootstrap button


function add_class_the_tags($html)
{
    $postid = get_the_ID();
    $html = str_replace("<a", '<a class="tags"', $html);
    return $html;
}
add_filter("the_tags", "add_class_the_tags", 10, 1);
?>
<?php
// adds the magnific jQuery code
function insert_magnific_js()
{
    ?>
    <script type="text/javascript">
        // <![CDATA[
        jQuery(document).ready(function($) {
            $("a[rel='magnific']").magnificPopup({
                type: 'image'
            });
        });
        // ]]>
    </script>
<?php
}
add_action("wp_head", "insert_magnific_js");
?>
<?php // automatically add magnific rel attributes to embedded images


function insert_magnific_rel($content)
{
    $pattern = '/<a(.*?)href="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>/i';
    $replacement = '<a$1href="$2.$3" rel=\'magnific\'$4>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
add_filter("the_content", "insert_magnific_rel");
?>
<?php
//add svg support to WordPress uploader
function cc_mime_types($mimes)
{
    $mimes["svg"] = "image/svg+xml";
    return $mimes;
}
add_filter("upload_mimes", "cc_mime_types");
 ?>
