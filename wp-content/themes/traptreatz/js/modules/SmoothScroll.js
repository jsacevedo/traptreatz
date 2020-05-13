class SmoothScroll {
  constructor() {
    this.menuLink = document.querySelector('.menu-link');
    this.ourStoryLink = document.querySelector('.our-story-link');
    this.ourStoryTarget = document.getElementById('our-story');
    this.menuTarget = document.getElementById('product-menu');

    this.events();
  }

  // Event listeners
  events() {
    this.ourStoryLink.addEventListener('click', this.scrollToStory.bind(this));
  }

  scrollToStory() {
    console.log('I was clicked');
    this.ourStoryTarget.scrollIntoView({
      behavior: "smooth", 
      block: "start", 
      inline: "nearest"
    });
    console.log(this.ourStoryTarget);
  }
}

export default SmoothScroll;