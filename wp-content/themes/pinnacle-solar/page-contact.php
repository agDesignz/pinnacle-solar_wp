<?php
  get_header();
?>

<main class="container--contact grid--full">

  <section class="top-title container--full"
    style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-wd-1.jpg'); ?>)">
    <div class="top-title__filter grid--full">
      <div class="about-title__content container--central">
        <h1 class="heading-1 text-light">Contact us</h1>
        <h3 class="heading-3 text-light">Get in touch to find out how solar energy can help you.</h3>
      </div>
    </div>
  </section>

  <section class="contact-us container--full grid--full">

      <div class="contact-us__container container--central grid content--md-80">
        <!-- <h2 class="contact-us__heading content--full">Get started today!</h2> -->
        <div class="contact-us__content content--span-6 content--md-full content--80 content--grid">

          <h3 class="contact-us__subheading heading-3">Contact us for a no-cost assessment</h3>
          <h4 class="contact-us__text">With the price of energy sky-rocketing, why wait to see if your home or
            business is right for solar?</h4>
          <h4 class="contact-us__text">There is no cost for the assessment. We show you your options, calculate
            your savings and answer all of your questions.</h4>
        </div>

        <div class="content--span-6 content--md-full">
          <?php contactForm('right', 'contact-form--dark'); ?>
        </div>

      </div>

  </section>


</main>


<?php
    get_footer();
  ?>