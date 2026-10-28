class StickyNav{
  constructor() {
    this.headerTop = document.querySelector('.header__top');
    this.header = document.querySelector('.header');
    this.headerHeight = this.header.getBoundingClientRect().height;
    this.options = {
      root: null,
      threshold: 0,
      rootMargin: `${this.headerHeight}px`
    };
    this.navObserver = new IntersectionObserver(this.navStick.bind(this), this.options)

    this.events();
  }

  events() {
    this.navObserver.observe(this.header);
  }

  navStick(entries) {
    const [entry] = entries;
    if (!entry.isIntersecting) {
      this.headerTop.classList.add('sticky');
    } else {
      this.headerTop.classList.remove('sticky');
    }
  }
}

export default StickyNav;