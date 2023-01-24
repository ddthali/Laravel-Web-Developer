const preloaders = document.getElementById("preloader");
const special = document.querySelector(".special");
const header = document.querySelector("#navbars");
const ps = document.querySelector("#ptags");
const container1 = document.querySelector("#aboutcmg");
const vision = document.querySelector(".VisionBN");
const vendor = document.querySelector("#VENDORBN");
const container2 = document.querySelector("#fbfanpage");
const footer = document.querySelector('#footer');
const carousel = document.querySelector('#CMGCarousel');
const pointers = document.querySelector('#pointer1');
const listItems = document.querySelectorAll('li.fade-in-left');
const listItems2 = document.querySelectorAll('li.fade-in-left2');
const cover_img = document.querySelector("#cover-image");
const cover_img1 = document.querySelector("#cover-image1");
const cover_img2 = document.querySelector("#cover-image2");
const cover_img3 = document.querySelector("#cover-image3");
const cover_img4 = document.querySelector("#cover-image4");
const nav2 = document.querySelector("#navbarCollapse");
const bodybg = document.querySelector("body");
const buttonToTop = document.querySelector('#toTopBTN')
let imgview;
const images = [];
// Set the initial delay for each list item
let delay2=1200;
let delay=0;
function dsnone(){
    preloaders.style.display="none";
    special.style.display="block";
    bodybg.classList.add("background-fixed");
    special.classList.add("background-fixed");
  if(header!=null){
    header.classList.remove("headernaja");
    header.classList.add("animate__animated");
    header.classList.add("animate__fadeInDown");
    header.classList.add("animate__slow");
  }
  if(cover_img!=null){
    cover_img.classList.add("animate__animated");
    cover_img.classList.add("animate__fadeIn");
    cover_img.classList.add("animate__slow");
  }
  if(cover_img1!=null){
    cover_img1.classList.add("animate__animated");
    cover_img1.classList.add("animate__fadeIn");
    cover_img1.classList.add("animate__slow");
  }
  if(cover_img2!=null){
    cover_img2.classList.add("animate__animated");
    cover_img2.classList.add("animate__fadeIn");
    cover_img2.classList.add("animate__slow");
  }
  if(cover_img3!=null){
    cover_img3.classList.add("animate__animated");
    cover_img3.classList.add("animate__fadeIn");
    cover_img3.classList.add("animate__slow");
  }
  if(cover_img4!=null){
    cover_img4.classList.add("animate__animated");
    cover_img4.classList.add("animate__fadeIn");
    cover_img4.classList.add("animate__slow");
  }
  if(container1!=null){
    container1.classList.add("animate__animated");
    container1.classList.add("animate__fadeInUp");
    container1.classList.add("animate__slow");
  }
  if(container2!=null){
    Ob2.observe(container2);
  }
  if(vision!=null){
    vision.classList.add("animate__animated");
    vision.classList.add("animate__fadeInLeft");
    vision.classList.add("animate__slow");
    listItems2.forEach(li => {
      setTimeout(() => {
        li.classList.add('show');
        console.log("This is delay2 = "+delay2);
      }, delay2);
      delay2 += 500; // Increase the delay by 500ms for each list item
    });
    if(AOS.init()){
        console.log("Has AOS");
    }else{
        console.log("Hasn't AOS");
    }
  }
  imgview = document.querySelectorAll(".img-view")
  if(imgview != undefined){
    //Push source URL in images Array
    imgview.forEach(img => images.push(img.getAttribute('src')));
    }
}

function addFadeOUT(){
    if(preloaders!=null){
    preloaders.classList.add("fadeOutUp");
    }
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
          if(entry.target == footer){
            console.log("You are at the end of bottom!");
            footer.classList.add("animate__animated");
            footer.classList.add("animate__fadeInUp");
            footer.classList.add("animate__slow");
            observer.unobserve(entry.target);
          }else if(entry.target == pointers){
            listItems.forEach(li => {
              setTimeout(() => {
                li.classList.add('show');
                console.log(delay);
              }, delay);
              delay += 200; // Increase the delay by 200ms for each list item
            });
            observer.unobserve(entry.target);
          }
        }
      });
    });
    if(footer!=null){
    observer.observe(footer);
    }
    if(pointers!=null){
    observer.observe(pointers);
    }
    const Ob2 = new IntersectionObserver((entries)=>{
      entries.forEach((entry)=>{
        if(entry.isIntersecting){
          container2.classList.add("animate__animated");
          container2.classList.add("animate__fadeInLeft");
          container2.classList.add("animate__slow");
          container2.classList.add("animate-delay-2s");
          Ob2.unobserve(entry.target);
        }
      })
    })
    // observPage.observe(pointer1);
function ScrollToTop(){
      const viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
      const buttonHeight = viewportHeight * 0.5;
      let currentScrollPosition = document.documentElement.scrollTop;
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

$(document).ready(()=>{
  $(window).scroll(()=>{
    if(buttonToTop!=null){
        ScrollToTop();
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
  })
   // Get The Element List
  // Declare Array of image URLs
  // Current index
  let currentIndex = 0;
  function previosDer(){
    currentIndex--;
    // If the current index is less than 0, set it to the last index in the array
    if (currentIndex < 0) {
      currentIndex = images.length - 1;
    }
    $("#full-size-image").attr("src", images[currentIndex]);
}
function nextTo(){
    currentIndex++;
    // If the current index is greater than or equal to the length of the array, set it to 0
    if (currentIndex >= images.length) {
      currentIndex = 0;
    }
    $("#full-size-image").attr("src", images[currentIndex])
    }
  // Bind click event to images
  $(".img-view").click(function() {
    // Set the src of the full-size image to the src of the clicked image
    $("#full-size-image").attr("src", $(this).attr("src"));
    // Set the current index to the index of the clicked image in the images array
    currentIndex = images.indexOf($(this).attr("src"));
    console.log("You clicked "+currentIndex);
    // Show the overlay
    $("#overlay").fadeIn();
    $(document).keydown(function(e){
        //left key
        if (e.which == 37) {
            previosDer();
        }
        //right key
        if (e.which == 39) {
            nextTo();
         }
         //escape key
         if (e.keyCode == 27) {
            $("#overlay").fadeOut();
        }
    });
  });

  // Bind click event to previous button
  $("#prev-button").click(function() {
    previosDer();
  });

  // Bind click event to next button
  $("#next-button").click(function() {
    nextTo();
  });

  // Bind click event to close button and overlay
  $("#close-button").click(function() {
    // Hide the overlay
    $("#overlay").fadeOut();
  });
})

