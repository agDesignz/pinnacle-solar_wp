class SmallNav {
  constructor() {
    this.body = document.querySelector("body");
    this.navBox = document.querySelector('.hamburger__checkbox')
    this.nav = document.querySelector('.nav');
    this.events();
  }

  events() {
    this.clearNav();
    this.navBox.addEventListener('change', () => this.dropMenu());
    this.nav.addEventListener('click', e => this.resetNav(e));
    this.navBox.checked = false;
  }

  clearNav() {
    this.navBox.checked = false;
    if (this.body.classList.contains('u-overflow-hidden')) this.body.classList.remove('u-overflow-hidden');
    if (this.nav.classList.contains('reveal')) this.nav.classList.remove('reveal');
  }

  dropMenu() {
    if (this.navBox.checked) {
      this.nav.classList.add("reveal");
      this.body.classList.add('u-overflow-hidden');
    } else {
      this.nav.classList.remove("reveal");
      this.body.classList.remove('u-overflow-hidden');
    }
  }

resetNav(e) {
  if (e.target.closest('li').classList.contains('menu-item')) this.clearNav();
}


}

export default SmallNav;