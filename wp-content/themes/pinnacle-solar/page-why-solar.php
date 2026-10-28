<?php
  get_header();
?>

<main class="container--why-solar grid--full">

  <section class="top-title container--full" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-wd-1.jpg'); ?>)">
    <div class="top-title__filter grid--full">
      <div class="about-title__content container--central">
        <h1 class="heading-1 text-light">Why Solar</h1>
        <h3 class="heading-3 text-light">Why buy electricity when you can produce your own?</h3>
      </div>
    </div>

  </section>

<section class="why-intro container--central grid">
  <div class="why-intro__container content--grid content--center-80">
    <h2 class="heading-2">Solar Energy Works for You</h2>
    <p>
      Let the sun work for you and immediately save money while building equity in your home! Wall Street investors shouldn’t dictate our monthly bills. It’s time we take back control. We’ve been “renting” electricity much the same way since the time of Thomas Edison. As rates continue to climb year after year, there is no better time to finally take control and harness the power of the sun. Saving tens of thousands of dollars isn’t the only reason to go solar. Solar energy creates energy independence for the community, the state and America!
    </p>
  </div>

</section>

<section class="why-save container--full grid--full u-pad-lg">
  <div class="grid--center-align container--central  grid content--md-80">
    <div class="content--span-6 content--md-full content--grid content--80">
      <h2 class="description__heading heading-2">Save Money</h2>
      <p>Simply put, solar saves a lot of money. When the sun is your fuel, say goodbye to big bills from the energy monopolies.</p>
    </div>

    <figure class="description__fig grid__fig content--span-6 content--md-full content--grid">
      <img src="<?php echo get_theme_file_uri('/assets/images/img-md-5.jpg') ?>" alt="Sun shining on a solar roof" class="description__img">
    </figure>
  </div>
</section>

<section class="why-perks container--full grid--full" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-why-1.jpg'); ?>)">
  <div class="why-perks__filter container--full grid--full">


  <div class="why-perks__container container--central grid content--md-80">
    <div class="why-perks__box why-perks__box--value">
      <h2 class="heading-2">Increase Your Home Value</h2>
      <p>Independent studies show homes with solar energy sell faster, and for more money. And the increase in value is tax-exempt.</p>
    </div>

    <div class="why-perks__box why-perks__box--incentives">
      <h2 class="heading-2">Get Financial Incentives</h2>
      <p>We can help you take advantage of the federal and state incentives that help you save money, all while securing the grid!</p>
    </div>

    <div class="why-perks__box why-perks__box--batteries">
      <h2 class="heading-2">Batteries</h2>
      <p>Battery technology has come a long way and with the incentives available, it’s never been a better time to back up your home with solar. Never again will you need to buy fuel for a noisy generator when your home runs off a silent battery system.</p>
    </div>
  </div>
  </div>
</section>

<section class="why-protect container--full grid--full u-pad-lg">
  <div class="container--central  grid content--md-80 grid--center-align">
    <figure class="description__fig--2 grid__fig content--span-6 content--md-full content--grid">
      <img src="<?php echo get_theme_file_uri('/assets/images/img-md-6.jpg') ?>" alt="family in a sunny field" class="description__img">
    </figure>

    <div class="description__content content--span-6 content--md-full content--grid content--80 content--right">
      <h2 class="description__heading heading-2">Protect the Environment</h2>
      <p>Saving money isn’t the only benefit. Cutting emissions will help provide a cleaner future for everyone!</p>
    </div>
  </div>
</section>

<section class="why-options container--full" style="background-image: url(<?php echo get_theme_file_uri('/assets/images/bg-wd-3.jpg'); ?>)">

  <div class="why-options__filter grid--full u-pad-lg">
    <div class="container--central grid content--md-80">
      <h2 class="why-options__heading content--full heading-2 u-center-text text-gold">No Up-Front Costs?</h2>
      <h3 class="why-options__subheading content--full heading-3 text-light">The many financing options with no money down mean you can start saving immediately.</h3>
        <?php get_template_part('template-parts/finance-options'); ?>

      <h3 class="why-options__subheading heading-3 content--full u-center-text text-light">Contact us
        and we'll
        help you find the solar option that's right for you</h3>
      <a href="<?php echo site_url('/contact'); ?>" class="btn btn--gold btn--dark-bg home-options__btn"><span class="btn__link">Get a quote</span></a>

    </div>
  </div>

</section>


</main>

<?php
  get_footer();
?>
