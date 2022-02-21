<?php
?>
<!doctype html>

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127177762-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-127177762-1');
    </script>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php if (bi_get_data('custom_favicon') !== '') : ?>
        <link rel="icon" type="image/png" href="<?php echo bi_get_data('custom_favicon'); ?>" />
    <?php endif; ?>

    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php get_template_directory_uri(); ?>/js/html5shiv.js"></script>
      <script src="<?php get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One|K2D|Quicksand|Text+Me+One|Catamaran|Dosis" rel="stylesheet">


</head>

<body class="text-dark" <?php body_class(); ?>>

    <?php gents_container(); // before container hook 
    ?>


    <?php gents_header(); // before header hook 
    ?>
    <header>

        <?php gents_in_header(); // header hook 
        ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-gold" role="navigation">
            <div class="container">
				                <div id="logo"><a href="https://pollianapertence.arq.br/" title="Polliana Pertence - Escritório de Arquitetura" rel="home">
                        <img src="https://pollianapertence.arq.br/wp-content/uploads/2022/02/logo.webp" alt="Escritório de Arquitetura em Ouro Preto - Arquiteta Polliana Pertence" class="img-fluid mw-100" />
                    </a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'stanleywp' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>


                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </nav>

        <script type="text/javascript">
            (function(c, l, a, r, i, t, y) {
                c[a] = c[a] || function() {
                    (c[a].q = c[a].q || []).push(arguments)
                };
                t = l.createElement(r);
                t.async = 1;
                t.src = "https://www.clarity.ms/tag/" + i;
                y = l.getElementsByTagName(r)[0];
                y.parentNode.insertBefore(t, y);
            })(window, document, "clarity", "script", "3xupg6vhiz");
        </script>
    </header><!-- end of header -->
    <?php gents_header_end(); // after header hook 
    ?>

    <?php gents_wrapper(); // before wrapper 
    ?>

    <div id="wrapper" class="clearfix">

        <?php gents_in_wrapper(); // wrapper hook 
        ?>