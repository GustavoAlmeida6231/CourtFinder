class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
      this.mobileMenu = document.querySelector(mobileMenu);
      this.navList = document.querySelector(navList);
      this.navLinks = document.querySelectorAll(navLinks);
      this.activeClass = "active";
  
      this.handleClick = this.handleClick.bind(this);
    }
  
    animateLinks() {
      this.navLinks.forEach((link, index) => {
        link.style.animation
          ? (link.style.animation = "")
          : (link.style.animation = `navLinkFade 0.5s ease forwards ${
              index / 7 + 0.3
            }s`);
      });
    }
  
    handleClick() {
      this.navList.classList.toggle(this.activeClass);
      this.mobileMenu.classList.toggle(this.activeClass);
      this.animateLinks();
    }
  
    addClickEvent() {
      this.mobileMenu.addEventListener("click", this.handleClick);
    }
  
    init() {
      if (this.mobileMenu) {
        this.addClickEvent();
      }
      return this;
    }
  }
  
  const mobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".nav-list",
    ".nav-list li",
  );
  mobileNavbar.init();

  var formSignin = document.querySelector('#signin')
  var formSignup = document.querySelector('#signup')
  var btnColor = document.querySelector('.btnColor')
  
  document.querySelector('#btnSignin')
    .addEventListener('click', () => {
      formSignin.style.left = "25px"
      formSignup.style.left = "450px"
      btnColor.style.left = "0px"
  })
  
  document.querySelector('#btnSignup')
    .addEventListener('click', () => {
      formSignin.style.left = "-450px"
      formSignup.style.left = "25px"
      btnColor.style.left = "110px"
  })

  function aumentarDiv() {
    var container = document.getElementById("container");
    var mainlog = document.getElementById("mainlog");
    container.style.height = "755px"; // Defina a altura desejada

  }


  function diminuirDiv() {
    var container = document.getElementById("container");
    var mainlog = document.getElementById("mainlog");
    container.style.height = "450px"; // Defina a altura desejada
  }


  