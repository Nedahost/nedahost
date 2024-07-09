    </main>
    <footer>
        <div class="wrapper"><!-- wrapper start -->
            <div class="outerfooter"><!-- outerfooter start -->
                <div class="footerlogo"><!-- footer logo start -->
                    <a href="">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" />
                    </a>
                </div><!-- footer logo end -->
                <div class="footerdetails"><!-- footer details start -->
                    <div class="footerdetails__list"><!-- list start -->
                        <h5>Επικοινωνία:</h5>
                        <ul>
                            <li>T. +30 697 5686 473</li>
                            <li>Δ. ΕΛΑΣΣΩΝΟΣ 16, ΠΕΡΙΣΤΕΡΙ ΑΤΤΙΚΗΣ, Τ.Κ. 121 37</li>
                            <li>E. INFO@NEDAHOST.GR</li>
                        </ul>
                        <div class="socialmedia"><!-- social media start -->
                            <h6>Ακολούθησε μας στα social media:</h6>
                            <ul>
                                <li>
                                    <a href="https://www.linkedin.com/company/18602896" target="_blank">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.png" alt="Linkedin" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/nedahost" target="_blank">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/facebook.png" alt="Facebook" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/nedahost/" target="_blank">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/instagram.png" alt="Instagram" />
                                    </a>
                                </li>
                            </ul>
                        </div><!-- social media end-->
                    </div><!-- list end -->
                    <div class="footerdetails__map"><!-- map start -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2071.561297849435!2d23.668057423909232!3d38.02365704619108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a1a3974ed9527b%3A0xa23668de2665e4b3!2zTmVkYWhvc3QgLSDOms6xz4TOsc-DzrrOtc-Fzq4gzpnPg8-Ezr_Pg861zrvOr860z4nOvQ!5e0!3m2!1sel!2sgr!4v1652691495554!5m2!1sel!2sgr" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- map end -->
                </div><!-- footer details end -->
            </div><!-- outerfooter end -->
        </div><!-- wrapper end -->
    </footer>

    <script>
  jQuery(document).ready(function($) {
            var forEach = function (t, o, r) {
                if ("[object Object]" === Object.prototype.toString.call(t))
                    for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
                else for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t);
            };
        
            var hamburgers = document.querySelectorAll(".hamburger");
            if (hamburgers.length > 0) {
                forEach(hamburgers, function (hamburger) {
                    hamburger.addEventListener("click", function () {
                        this.classList.toggle("is-active");
                        document.body.classList.toggle("menu-open");
                    }, false);
                });
            }
        });
        </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var accordionTitles = document.getElementsByClassName('accordion-title');
            for (var i = 0; i < accordionTitles.length; i++) {
                accordionTitles[i].addEventListener('click', function() {
                    var questionText = this.querySelector('.title-text').textContent;
                    gtag('event', 'faq_accordion_click', {
                        'question_text': questionText
                    });
                });
            }
        });
</script>

     <?php wp_footer(); ?>

    </body>
</html>