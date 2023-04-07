<?php
  get_header();
?>

<div class="top-background" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-front-top.jpg') ?>)">
</div>

<div class="home-hero grid--full">
  <h1 class="home-hero__title heading-1 heading-1 text-light">A partnership with the sun</h1>
  <h2 class="home-hero__tagline heading-2 text-light hero-subheading">Take control of your energy today!</h2>
  <a href="#" class="btn btn--gold btn--dark-bg home-hero__btn">
    <span class="btn__link">Get a quote</span>
  </a>
</div>

  <main class="container--home  grid--full">

    <section class="home-intro container--central grid content--md-80">

      <h2 class="heading-2  home-intro__heading content--full">Solar Energy Solutions for New England</h2>

      <div class="home-intro__content content--grid content--span-6 content--md-full content--80">
        <div class="home-intro__block">
          <h3 class="home-intro__subheading heading-3 ">Who we are</h2>
            <p>
              We are a small business in the beautiful Berkshire mountains of western Massachussetts committed to
              helping our customers with their solar needs and all that jazz.
            </p>
        </div>
        <div class="home-intro__block">
          <h3 class="home-intro__subheading heading-3 ">What we do</h3>
          <p>
            We provide the best experience for home and business owners as they transition to the savings of solar
            energy.
            We know you work hard for your money. We work hard to make sure you keep it.
          </p>
        </div>
        <a href="#" class="btn btn--gold-border home-intro__btn"><span class="btn__link">About Us</span></a>
      </div>


      <div class="home-intro__stack content--span-6 content--md-full">
      <figure class="home-intro__fig grid__fig content--span-6 content--md-full content--grid">
            <img src="<?php echo get_theme_file_uri('/assets/images/img-md-1.jpg') ?>" alt="House with rooftop solar panels" class="description__img">
          </figure>
      </div>
    </section>

    <section class="home-options grid--full" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-front-2.jpg'); ?>)">
      <div class="home-options__cover grid--full">
        <div class="home-options__container grid content--md-80">
          <h2 class="home-options__heading content--full heading-2 text-gold">Your solar options</h2>
          <h3 class="home-options__subheading content--full text-light heading-3">We offer a plethora of solar home energy
            solutions
            tailored to your needs</h3>

            <?php get_template_part('template-parts/finance-options'); ?>

          <h3 class="home-options__subheading home-options__subheading--bottom heading-3 content--full text-light">Contact us
            and we'll
            help you find the solar option that's right for you</h3>
          <a href="#" class="btn btn--gold btn--dark-bg home-options__btn"><span class="btn__link">Get a quote</span></a>
        </div>
      </div>
    </section>

    <section class="home-info container--full container--full--padded grid">
      <h2 class="home-info__heading heading-2 content--full">How it works</h2>

      <div class="image-card content--span-3 content--lg-6 content--sm-full">
        <div class="image-card__content">
          <h3 class="image-card__heading heading-3 text-light">Assess</h3>
          <p class="image-card__text">The first step is to find what works best for you. An expert will evaluate your
            site, answer all your questions and develop a plan to maximize your savings.</p>
        </div>
        <div class="image-card__background" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/card-1.jpg') ?>)"></div>
      </div>

      <div class="image-card content--span-3 content--lg-6 content--sm-full">
        <div class="image-card__content">
          <h3 class="image-card__heading heading-3 text-light">Install</h3>
          <p class="image-card__text">Installations typically take one to two days. Our engineers plan ahead with you so
            the exciting day goes smoothly and you’re up and saving in no time.</p>
        </div>
        <div class="image-card__background" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/card-2.jpg') ?>)"></div>
      </div>

      <div class="image-card content--span-3 content--lg-6 content--sm-full">
        <div class="image-card__content">
          <h3 class="image-card__heading heading-3 text-light">Save</h3>
          <p class="image-card__text">Experience a new, thrilling sensation every time the sun is out and shining. Your
            system is producing and the savings keep building up over the years.</p>
        </div>
        <div class="image-card__background" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/card-3.jpg') ?>)"></div>
      </div>

      <div class="image-card content--span-3 content--lg-6 content--sm-full">
        <div class="image-card__content">
          <h3 class="image-card__heading heading-3 text-light">Easy</h3>
          <p class="image-card__text">Your system is full insured, and and we are with you every step of the way.</p>
        </div>
        <div class="image-card__background" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/card-4.jpg') ?>)"></div>
      </div>

      <div class="content--grid content--center-80 content--md-80">
        <h3 class="home-info__subheading heading-3">Learn more about our process and how we can help you save money
          while taking control of your energy needs</h3>
        <a href="#" class="text-btn">Learn More <i class="las la-arrow-right"></i></a>
      </div>

    </section>

    <section class="benefits grid--full container--full">

      <div class="benefits__container container--central grid content--md-80">
        <figure class="content--span-4">
          <img src="<?php echo get_theme_file_uri('/assets/images/img-md-2.jpg') ?>" alt="A hand gesturing towards thte sun">
        </figure>
        <div class="content--grid content--span-8 content--md-full">
          <h2 class="heading-2">The Benefits of Solar Energy</h2>
          <p>Let the sun work for you and immediately save money while building equity in your home! We’ve been “renting” electricity much the same way since the time of Thomas Edison. As rates continue to climb year after year, there is no better time to finally take control and harness the power of the sun. Saving tens of thousands of dollars isn’t the only reason to go solar. Solar energy creates energy independence for the community, the state and America!</p>
        </div>
      </div>
    </section>

    <section class="home-cta grid--full container--full" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-front-3.jpg') ?>)">
      <div class="home-cta__cover grid--full container--full">

      <div class="home-cta__container container--central grid content--md-80">
        <h2 class="home-cta__heading content--full text-light">Get started today!</h2>
        <div class="home-cta__content content--span-6 content--md-full content--80 content--grid">

          <h3 class="home-cta__subheading heading-3 text-light">Contact us for a no-cost assessment</h3>
          <h4 class="home-cta__text text-light">With the price of energy sky-rocketing, why wait to see if your home or
            business is right for solar?</h4>
          <h4 class="home-cta__text text-light">There is no cost for the assessment. We show you your options, calculate
            your savings and answer all of your questions.</h4>
        </div>

        <div  class="content--span-6 content--md-full">
          <?php contactForm('right'); ?>
        </div>


      </div>

    </div>
    </section>

  </main>

  <?php
    get_footer();
  ?>
