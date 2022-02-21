<?php
?>

<div id="ww">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
				        <?php
        echo do_shortcode('[smartslider3 slider="2"]');
        ?>
                    <h1> <?php the_title(); ?></h1>
                    <?php the_content(); ?>
            </div><!-- /col-lg-8 -->
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /ww -->