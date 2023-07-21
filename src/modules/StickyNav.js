class StickyNav{
  constructor() {
    this.headerTop = document.querySelector('.header__top');
    this.header = document.querySelector('.header');
    this.headerHeight = header.getBoundingClientRect().height;
    this.options = {
      root: null,
      threshold: 0,
      rootMargin: `${headerHeight}px`
    };
    this.navObserver = new IntersectionObserver(this.navStick.bind(this), this.options)

    this.events();
  }

  events() {
    this.navObserver.observe(this.header);
  }

  navStick(entries) {
    const [entry] = entries;
    if (!entry.insInterstcting) {
      this.headerTop.classList.add('sticky');
    } else {
      this.headerTop.classList.remove('sticky');
    }
  }
}

export default StickyNav;