<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T7RGHQV');</script>
        <!-- End Google Tag Manager -->
        
        <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet"> 
        <?php wp_head(); ?>
        
    </head>
    <body <?php body_class(); ?>>
        <header>
            <div class="topheader"><!-- flex topheade start -->
                <figure>
                    <?php
                    $header_image = get_header_image();
                    if ( ! empty( $header_image ) ) { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
                    </a>
                    <?php } ?>
                </figure>
                <div id="outermenu">

                <div class="hamburger hamburger--slider-r">
    <div class="hamburger-box">
      <div class="hamburger-inner"></div>
    </div>
  </div>
  <div id="navigation">
    <nav>
  <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class' => 'dropdown'
                        )
                    );
                    ?>
</nav>
  </div>
                </div>
            </div><!-- flex topheade end -->
            <div class="sectiontitle"><!-- section title start -->
            <?php if(is_home()){ ?>
                <h1 class="headtitle">NEDAHOST</h1>
                <span>a digital agency for web solutions</span>
            <?php }elseif(is_page()){ ?>
                <h1><?php echo esc_html( get_the_title() ); ?></h1>
                <p>
                  
                </p>
                <?php } ?>
                
            </div><!-- section title end -->
            <?php if(is_home()){ ?>
            <div class="readmore"><!-- read more start -->
                <div class="read">
                    <a href="" >
                        Ας φτιάξουμε <br />κάτι μοναδικό.
                    </a>
                </div>
            </div><!-- read more end -->
            <?php } ?>
        </header>
        <main>