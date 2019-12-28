class SideMenu {
  constructor() {
    this.sideMenu = document.getElementById("side-menu");
    this.openButton = document.getElementById("side-navbar-open");
    this.closeButton = document.getElementById("side-navbar-close");
    this.events();
  }

  events() {
    this.openButton.addEventListener("click", this.openMenu.bind(this));
    this.closeButton.addEventListener("click", this.closeMenu.bind(this));
  }

  openMenu(event) {
    event.preventDefault();

    this.sideMenu.classList.remove("hide-menu");
    this.sideMenu.classList.add("show-menu");
  }

  closeMenu(event) {
    event.preventDefault();

    this.sideMenu.classList.remove("show-menu");
    this.sideMenu.classList.add("hide-menu");
  }
}

export default SideMenu;