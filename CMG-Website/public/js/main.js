const preloaders = document.getElementById("preloader");
const special = document.querySelector(".special");
const header = document.querySelector("#navbars");
const ps = document.querySelector("#ptags");
const container1 = document.querySelector("#aboutcmg");
const container2 = document.querySelector("#fbfanpage");
const footer = document.querySelector('#footer');
const carousel = document.querySelector('#CMGCarousel');
const nav2 = document.querySelector("#navbarCollapse");
const bodybg = document.querySelector("body");
function dsnone(){
    preloaders.style.display="none";
    special.style.display="block";
    carousel.classList.remove("headernaja");
    bodybg.classList.add("background-fixed");
    special.classList.add("background-fixed");
    carousel.classList.add("animate__animated");
    carousel.classList.add("animate__fadeIn");
    carousel.classList.add("animate__slow");
    header.classList.remove("headernaja");
    header.classList.add("animate__animated");
    header.classList.add("animate__fadeInDown");
    header.classList.add("animate__slow");
}

function addFadeOUT(){
    preloaders.classList.add("fadeOutUp");
    setTimeout(dsnone, 2000);
}
    window.addEventListener("load",()=>{
        // preloaders.style.display="none";
        addFadeOUT();
        // preloaders.classList.add("animate__fadeInDown");
    });
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          console.log("You are at the end of bottom!");
          footer.classList.add("animate__animated");
          footer.classList.add("animate__fadeInUp");
          footer.classList.add("animate__slow");
          observer.unobserve(entry.target);
        }
      });
    });
    const obcarousel = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.intersectionRatio <= 0) {
            console.log("The carousel are out of range!");
            nav2.style.flexGrow = "1";
          }else{
            nav2.style.flexGrow = "0";
          }
        });
      });
    observer.observe(footer);
    function ScrollToTop(){
        const viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
        const buttonHeight = viewportHeight * 0.5;
        let currentScrollPosition = document.documentElement.scrollTop;
        let buttonToTop = document.querySelector('#toTopBTN')
        // The button should appear when the user scrolls down 50% of the viewport height.
        if (currentScrollPosition > buttonHeight) {
          // Display the scroll to top button.
          if(buttonToTop.classList.contains('animate__fadeOut')){
              buttonToTop.classList.remove('animate__fadeOut');
          }
          buttonToTop.style.display = 'grid';
          buttonToTop.classList.add('animate__fadeIn');
        }else{
          if(buttonToTop.classList.contains('animate__fadeIn')){
              buttonToTop.classList.remove('animate__fadeIn');
          }
          buttonToTop.classList.add('animate__fadeOut');
          if(buttonToTop.style.opacity === '0'){
              buttonToTop.style.display = "none"
          }

        }
        buttonToTop.addEventListener('click',() => {
          document.documentElement.scrollTop = 0;
        });
  }
    $(document).ready(function() {
        $('img').Lazy();
        $(window).scroll(function() {
          ScrollToTop();
          var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      // Check if the element is in view
      if (scrollTop > container1.offsetTop - window.innerHeight) {
          // Fade in the element
          container1.classList.add("animate__animated");
          container1.classList.add("animate__fadeInUp");
          container1.classList.add("animate__slow");
          container2.classList.add("animate__animated");
          container2.classList.add("animate__fadeInLeft");
          container2.classList.add("animate__slow");
          container2.classList.add("animate-delay-2s");
        }
        header.classList.toggle("fixed-top",window.scrollY > 50);
        header.classList.toggle("no-padding",window.scrollY > 50);
        if(window.scrollY > 50){
            nav2.style.flexGrow = "1";
            nav2.style.justifyContent = "space-around";
            nav2.style.fontSize = "15px"
        }else{
            nav2.style.flexGrow = "0";
            nav2.style.justifyContent = "";
            nav2.style.fontSize = "18px"
        }

        });
      });
