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



/*----------------------- hide all section except active-------------------*/
(() => {
    const sections = document.querySelectorAll(".section");
    sections.forEach((section) => {
        if (!section.classList.contains("active")) {
            section.classList.add("hide");
        }
    })

})();





/*------------------ Preloader ---------------*/

window.addEventListener("load", () =>{
    //preloader
    document.querySelector(".preloader").classList.add("fade-out");
    setTimeout(() =>{
        document.querySelector(".preloader").style.display="none";
    },600)
})


