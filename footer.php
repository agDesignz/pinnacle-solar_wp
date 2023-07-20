<footer class="footer grid--full">

      <div class="footer__container grid">
        <div class="footer__box footer__box--logo">
          <img class="footer__logo-img" src="<?php echo get_theme_file_uri('/assets/images/logo-new.png') ?>" alt="Mini logo">
          <h3 class="heading-3 text-light text-right">Take control of your energy today!</h3>

        </div>


        <div class="footer__box footer__box--address">
          <a class="footer__phone" href="tel:+4132086208"><i class="las la-phone"></i>413-208-6208</a>
          <a href="mailto:info@pinnaclesolarenergy.com" class="footer__email"><i class="las la-at"></i>info@pinnaclesolarenergy.com</a>
          <p class="footer__address"><i class="las la-envelope"></i>P.O. Box 193, Becket MA 01223</p>
          <a href="<?php echo site_url('/contact'); ?>" class="btn btn--white-border btn--dark-bg footer__btn"><span class="btn__link">Get a quote</span></a>
        </div>

      </div>

      <div class="footer__bottom">
        <p class="copyright">© 2023 Pinnacle Solar</p>
      </div>

</footer>

<?php
  wp_footer();
?>

</body>

</html>
