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
        <title>Κατασκευή Ιστοσελίδων | Nedahost</title>
       
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400&family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet"> 
        <?php wp_head(); ?>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const accordionItems = document.querySelectorAll('.accordion-item');

            // Κάνετε το πρώτο accordion-item ανοιχτό
            const firstAccordionItem = accordionItems[0];
            const firstTitle = firstAccordionItem.querySelector('.accordion-title');
            const firstContent = firstAccordionItem.querySelector('.accordion-content');

            firstTitle.classList.add('active');
            firstContent.classList.add('active');

            accordionItems.forEach(item => {
              const title = item.querySelector('.accordion-title');
              const content = item.querySelector('.accordion-content');

              title.addEventListener('click', function() {
                accordionItems.forEach(otherItem => {
                  if (otherItem !== item) {
                    otherItem.querySelector('.accordion-content').classList.remove('active');
                    otherItem.querySelector('.accordion-title').classList.remove('active');
                  }
                });
                
                content.classList.toggle('active');
                title.classList.toggle('active');
              });
            });
          });

          </script>




<script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
  const burgerMenu = document.querySelector('.burger-menu');
  const menu = document.querySelector('.menu');
  const overlay = document.querySelector('.overlay');
  const body = document.querySelector('body');

  burgerMenu.addEventListener('click', function() {
    menu.classList.toggle('show-menu');
    burgerMenu.classList.toggle('open');
    overlay.classList.toggle('show-overlay');
    body.classList.toggle('no-scroll'); // Toggle no-scroll class on body
  });
});


        </script>



        <script type="text/javascript">
            $(document).ready(function() {
    $('.readmore a').on('click', function(event) {
        event.preventDefault();

        // Προσαρμόστε το ύψος που θέλετε να κατεβείτε
        var targetOffset = $('.outerservices').offset().top;

        // Εκτελέστε το smooth scroll
        $('html, body').animate({
            scrollTop: targetOffset
        }, 1000); // Χρόνος κύλισης σε milliseconds (εδώ είναι 1 δευτερόλεπτο)

        // Εάν θέλετε, μπορείτε να κλείσετε το μενού μετά το κλικ
        // Αν χρησιμοποιείτε Bootstrap, θα μπορούσατε να χρησιμοποιήσετε $('.navbar-toggler').click();
    });
});

            </script>

        <script type="text/javascript">


            document.addEventListener('DOMContentLoaded',function(event){
  // array with texts to type in typewriter
  var dataText = [ "Web Development.", "Digital Marketing", "S.E.O." ,"Nedahost"];
  
  // type one text in the typwriter
  // keeps calling itself until the text is finished
  function typeWriter(text, i, fnCallback) {
    // chekc if text isn't finished yet
    if (i < (text.length)) {
      // add next character to h1
     document.querySelector(".headtitle").innerHTML = text.substring(0, i+1) +'<span aria-hidden="true"></span>';

      // wait for a while and call this function again for next character
      setTimeout(function() {
        typeWriter(text, i + 1, fnCallback)
      }, 100);
    }
    // text finished, call callback if there is a callback function
    else if (typeof fnCallback == 'function') {
      // call callback after timeout
      setTimeout(fnCallback, 700);
    }
  }
  // start a typewriter animation for a text in the dataText array
   function StartTextAnimation(i) {
     if (typeof dataText[i] == 'undefined'){
        setTimeout(function() {
          StartTextAnimation(0);
        }, 20000);
     }
     // check if dataText[i] exists
    if (i < dataText[i].length) {
      // text exists! start typewriter animation
     typeWriter(dataText[i], 0, function(){
       // after callback (and whole text has been animated), start next text
       StartTextAnimation(i + 1);
     });
    }
  }
  // start the text animation
  StartTextAnimation(0);
});
        </script>

        <!-- Global site tag (gtag.js) - Google Ads: 1013125385 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-1013125385"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-1013125385'); </script>
        <!-- Event snippet for Website traffic conversion page --> <script> gtag('event', 'conversion', {'send_to': 'AW-1013125385/8sGwCIzQjcwDEImijOMD'}); </script> 

        
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
            <?php }elseif(is_page()){ ?>
                <h1><?php the_title(); ?></h1>
                <?php } ?>
                <span>a digital agency for web solutions</span>
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