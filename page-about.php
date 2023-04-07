<?php
  get_header();
?>

<main class="container--about grid--full">

    <section class="top-title container--full" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-wd-1.jpg'); ?>)">
      <div class="top-title__filter grid--full">
        <div class="about-title__content container--central">
          <h1 class="heading-1 text-light">About us</h1>
          <h3 class="heading-3 text-light">Our job is simple: to guide you to the best possible outcome.</h3>
        </div>
      </div>
    </section>

    <section class="description container--full grid--full">
      <div class="description__container container--central  grid content--md-80" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/rays-bg-2.png'); ?>)">

          <div class="description__content content--span-6 content--md-full content--grid content--80">
            <h2 class="description__heading heading-2">Our Company</h2>
            <p>Pinnacle Solar is western Massachusetts' first stop for solar energy solutions. We are a customer-centered company leveraging our experience in the energy sector to help get consumers get the best results to meet their energy needs, as well as the best ROI and lessen their impact on the environment.</p>
          </div>

          <figure class="description__fig grid__fig content--span-6 content--md-full content--grid">
            <img src="<?php echo get_theme_file_uri('/assets/images/img-md-3.jpg') ?>" alt="House among trees with solar panels" class="description__img">
          </figure>

          <figure class="description__fig--2 grid__fig content--span-6 content--md-full content--grid">
            <img src="<?php echo get_theme_file_uri('/assets/images/img-md-4.jpg') ?>" alt="Solar roof" class="description__img">
          </figure>

          <div class="description__content content--span-6 content--md-full content--grid content--80 content--right">
            <h2 class="description__heading heading-2">Our Mission</h2>
            <p>Solar isn’t just a business for us, it’s a passion. Our mission is to make going solar simple and
              comfortable. With the amount of money you save, and the benefits to the community, country and world, it
              should be exciting. We don’t do “pushy” – With the high quality of our work, products and local team members,
              we show you the facts and walk you through it so you know you’ve made the right choice.</p>
          </div>

      </div>
    </section>

    <section class="services container--full" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-wd-3.jpg'); ?>)">
      <div class="services__filter grid--full">
        <div class="services__content container--central grid">
          <div class="content--full content--grid">
            <h2 class="services__heading content--full heading-2">What can Pinnacle Solar offer you?</h2>
          </div>

          <div class="services__item content--span-3 content--md-6 content--sm-full content--grid">
            <img src="<?php echo get_theme_file_uri('/assets/images/logo-mini.png') ?>" alt="Rays from pinnacle logo" class="services__rays-img">
            <h3 class="services__subheading">Personalized Service</h3>
            <p class="services__text">We work with each you individually to help you find the energy solution that's right for you.</p>
          </div>

          <div class="services__item content--span-3 content--md-6 content--sm-full content--grid">
            <img src="<?php echo get_theme_file_uri('/assets/images/logo-mini.png') ?>" alt="Rays from pinnacle logo" class="services__rays-img">
            <h3 class="services__subheading">Peace of Mind</h3>
            <p class="services__text">Our team is commited to helping you find your way to address your needs with confidence and security.</p>
          </div>

          <div class="services__item content--span-3 content--md-6 content--sm-full content--grid">
            <img src="<?php echo get_theme_file_uri('/assets/images/logo-mini.png') ?>" alt="Rays from pinnacle logo" class="services__rays-img">
            <h3 class="services__subheading">Continuous Support</h3>
            <p class="services__text">Our commitment to you extends well beyond the install. From insuring the equipment to making sure you're getting the most from your system, we are here for you.</p>
          </div>

          <div class="services__item content--span-3 content--md-6 content--sm-full content--grid">
            <img src="<?php echo get_theme_file_uri('/assets/images/logo-mini.png') ?>" alt="Rays from pinnacle logo" class="services__rays-img">
            <h3 class="services__subheading">Help you save</h3>
            <p class="services__text">We know you work hard for your money. We work hard to make sure you keep it. That's the Pinnacle Promise!</p>
          </div>

        </div>
      </div>
    </section>

    <section class="about-cta container--central grid">
      <div class="content--grid content--center-80 content--md-80">

              <h2 class="about-cta__heading heading-2 content--full">Rready for your no-cost assessment?</h2>
              <div class="u-flex">
                <p>Getting Solar can be a simple process when you're in the right hands. Contact us and let us help you get started.</p>
              </div>

              <div class="u-flex--center">
                <a href="#" class="btn btn--gold">
                  <span class="btn__link">Get a quote</span>
                </a>
              </div>

      </div>
    </section>

  </main>

  <?php
    get_footer();
  ?>
