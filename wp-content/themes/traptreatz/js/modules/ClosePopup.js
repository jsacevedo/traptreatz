class ClosePopup {
  constructor() {
    this.notice = document.getElementById("woocommerce-message");
    this.closeBtn = document.getElementById("close-btn");
    
    this.events();
  }

  events() {
    this.closeBtn.addEventListener("click", (event) => {
      event.preventDefault();

      console.log("I Should be closing");
      this.notice.classList.add("hide-notice");
    });
  }
}

export default ClosePopup;