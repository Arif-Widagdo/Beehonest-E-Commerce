/*-------------------Header Menu --------------------------*/
const sectionMenu = document.querySelectorAll('section');
const navLi = document.querySelectorAll('header .container .list-menu ul li a');

window.addEventListener('scroll',()=>{
    let current = '';
  
    sectionMenu.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if(pageYOffset >= sectionTop){
            current = section.getAttribute('id');
        }
    })
    navLi.forEach(a =>{
        
        a.classList.remove('active');
        if(a.classList.contains(current)){
            a.classList.add('active')
        }
    })
})














/*------------------ Navigator ----------------------------------- */
$(document).ready(function(){
    $(window).scroll(function(){
        // sticky navbar on scroll script
        if(this.scrollY > 20){
            $('.header').addClass("sticky");
        }else{
            $('.header').removeClass("sticky outer-shadow hover-inner");
        }
        
        // scroll-up button show/hide script
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.header .menu li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    $('.footer-section .footer-col li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });
    // toggle menu/navbar script
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });
});








function bodyScrollingToggle() {
    document.body.classList.toggle("hidden-scrolling");
}

/*------------Portfolio filter and popup-------------------*/
(() => {
    const filterContainer = document.querySelector(".portfolio-filter"),
        portfolioItemsContainer = document.querySelector(".portfolio-items"),
        portfolioItems = document.querySelectorAll(".portfolio-item"),
        popup = document.querySelector(".portfolio-popup"),
        prevBtn = popup.querySelector(".pp-prev"),
        nextBtn = popup.querySelector(".pp-next"),
        closeBtn = popup.querySelector(".pp-close"),
        projectDetailsContainer = popup.querySelector(".pp-details"),
        projectDetailsBtn = popup.querySelector(".pp-project-details-btn");
    let itemIndex, slideIndex, screenshots;

    filterContainer.addEventListener("click", (event) => {
        if (event.target.classList.contains("filter-item") &&
            !event.target.classList.contains("active")) {
            //deactivate existing active 'filter-item'
            filterContainer.querySelector(".active").classList.remove("outer-shadow",
                "active");
            //active new 'filter item'
            event.target.classList.add("active", "outer-shadow");
            const target = event.target.getAttribute("data-target");
            portfolioItems.forEach((item) => {
                if (target === item.getAttribute("data-category") || target === 'all') {
                    item.classList.remove("hide");
                    item.classList.add("show");
                } else {
                    item.classList.remove("show");
                    item.classList.add("hide");
                }
            })
        }
    })

    portfolioItemsContainer.addEventListener("click", (event) => {
        if (event.target.closest(".portfolio-item-inner")) {
            const portfolioItem = event.target.closest(".portfolio-item-inner").parentElement;
            //get the portfolioItem index
            itemIndex = Array.from(portfolioItem.parentElement.children).indexOf(portfolioItem);
            screenshots = portfolioItems[itemIndex].querySelector(".portfolio-item-img img").getAttribute("data-screenshots");
            // convert screenshots into array
            screenshots = screenshots.split(",");
            if (screenshots.length === 1) {
                prevBtn.style.display = "none";
                nextBtn.style.display = "none";
            } else {
                prevBtn.style.display = "block";
                nextBtn.style.display = "block";
            }
            slideIndex = 0;
            popupToggle();
            popupSlideshow();
            popupDetails();
        }
    })

    closeBtn.addEventListener("click", () => {
        popupToggle()
        if (projectDetailsContainer.classList.contains("active")) {
            popupDetailsToggle();
        }
    })

    function popupToggle() {
        popup.classList.toggle("open");
        bodyScrollingToggle();
    }

    function popupSlideshow() {
        const imgSrc = screenshots[slideIndex];
        const popupImg = popup.querySelector(".pp-img");
        //activate loader untik the popupImg loaded
        popup.querySelector(".pp-loader").classList.add("active");
        popupImg.src = imgSrc;
        popupImg.onload = () => {
            // deactivate loader after the popupImg loaded
            popup.querySelector(".pp-loader").classList.remove("active");
        }
        popup.querySelector(".pp-counter").innerHTML = (slideIndex + 1) + " of " + screenshots.length;
    }

    // next slide
    nextBtn.addEventListener("click", () => {
        if (slideIndex === screenshots.length - 1) {
            slideIndex = 0;
        } else {
            slideIndex++;
        }
        popupSlideshow();

    })

    // prev slide
    prevBtn.addEventListener("click", () => {
        if (slideIndex === 0) {
            slideIndex = screenshots.length - 1;
        } else {
            slideIndex--;
        }
        popupSlideshow();
    })

    function popupDetails() {
        // if portfolio-item-details not exist
        if (!portfolioItems[itemIndex].querySelector(".portfolio-item-details")) {
            projectDetailsBtn.style.display = "none";
            return; /* end function execution */
        }
        projectDetailsBtn.style.display = "block";

        // get the project details
        const details = portfolioItems[itemIndex].querySelector(".portfolio-item-details").innerHTML;
        // set the project details
        popup.querySelector(".pp-project-details").innerHTML = details;
        // get the project title
        const title = portfolioItems[itemIndex].querySelector(".portfolio-item-title").innerHTML;
        const title2 = portfolioItems[itemIndex].querySelector(".portfolio-item-star").innerHTML;
        // set the project title
        popup.querySelector(".pp-title h2").innerHTML = title;
        popup.querySelector(".pp-title h1").innerHTML = title2;
        // get the project category
        const category = portfolioItems[itemIndex].getAttribute("data-category");
        // get the project category
        popup.querySelector(".pp-project-category").innerHTML = category.split("-").join(" ");
    }

    projectDetailsBtn.addEventListener("click", () => {
        popupDetailsToggle()
    })

    function popupDetailsToggle() {
        if (projectDetailsContainer.classList.contains("active")) {
            projectDetailsBtn.querySelector("i").classList.remove("fa-minus");
            projectDetailsBtn.querySelector("i").classList.add("fa-plus")
            projectDetailsContainer.classList.remove("active");
            projectDetailsContainer.style.maxHeight = 0 + "px";
        } else {
            projectDetailsBtn.querySelector("i").classList.remove("fa-plus");
            projectDetailsBtn.querySelector("i").classList.add("fa-minus")
            projectDetailsContainer.classList.add("active");
            projectDetailsContainer.style.maxHeight = projectDetailsContainer.scrollHeight + "px";
            popup.scrollTo(0, projectDetailsContainer.offsetTop);
        }
    }
})();


/* ---------------------------testimonial slider-----------------*/
(() => {
    const sliderContainer = document.querySelector(".testi-slider-container"),
        slides = sliderContainer.querySelectorAll(".testi-item"),
        slideWidth = sliderContainer.offsetWidth,
        prevBtn = document.querySelector(".testi-slider-nav .prev"),
        nextBtn = document.querySelector(".testi-slider-nav .next"),
        activeSlide = sliderContainer.querySelector(".testi-item.active");
    let slideIndex = Array.from(activeSlide.parentElement.children).indexOf(activeSlide);


    //set width of all slides
    slides.forEach((slide) => {
        slide.style.width = slideWidth + "px";
    })
    // set width of sliderContainer
    sliderContainer.style.width = slideWidth * slides.length + "px";

    nextBtn.addEventListener("click", () => {
        if (slideIndex === slides.length - 1) {
            slideIndex = 0;
        } else {
            slideIndex++;
        }
        slider();
    })

    prevBtn.addEventListener("click", () => {
        if (slideIndex === 0) {
            slideIndex = slides.length - 1;
        } else {
            slideIndex--;
        }
        slider();
    })

    function slider() {
        //deactivate existing active slides
        sliderContainer.querySelector(".testi-item.active").classList.remove("active");
        slides[slideIndex].classList.add("active");
        sliderContainer.style.marginLeft = -(slideWidth * slideIndex) + "px";
    }
    slider();
})();


/*----------------------- hide all section except active-------------------*/
(() => {
    const sections = document.querySelectorAll(".section");
    sections.forEach((section) => {
        if (!section.classList.contains("active")) {
            section.classList.add("hide");
        }
    })

})();







$(document).ready(function () {
    // typing text animation script
    var typed = new Typed(".typing", {
        strings: ["Be Healthy", "Be Happy", "Be Strong"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    var typed = new Typed(".typing-2", {
        strings: ["Be Healthy", "Be Happy", "Be Strong"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });



       // owl carousel script
       $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeOut: 2000,
        autoplayHoverPause: true,
        responsive: {
            0:{
                items: 1,
                nav: false
            },
            600:{
                items: 2,
                nav: false
            },
            1000:{
                items: 3,
                nav: false
            }
        }
    });


});
