<?php

function contactForm($position = 'left', $colorScheme = 'light') { ?>

  <form class="<?php echo $colorScheme ?>">
    <div class="contact-form__group">
      <input class="contact-form__input" placeholder="NAME">
    </div>
    <div class="contact-form__group">
      <input class="contact-form__input" placeholder="EMAIL">
    </div>
    <div class="contact-form__group">
      <input class="contact-form__input" placeholder="CONTACT NUMBER">
    </div>
    <div class="contact-form__group contact-form__group--message">
      <textarea class="contact-form__input contact-form__input--message" rows="8" placeholder="MESSAGE"></textarea>
    </div>
    <div class="contact-form__group contact-form__buttons contact-form__buttons--<?php echo $position ?>">
      <button type="submit" class="contact-form__button btn btn--sm">SEND</button>
    </div>
  </form>

<?php }
