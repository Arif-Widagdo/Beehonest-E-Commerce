
/*-------------- taggle style search --------------*/
const styleSwitcherToggler2 = document.querySelector(".style-search");
styleSwitcherToggler2.addEventListener("click", () => {
   document.querySelector(".style-switcher2").classList.toggle("open");
})

// hide style -switcher on scroll
window.addEventListener("scroll", () =>{
    if(document.querySelector(".style-switcher2").classList.toggle("open")){
        document.querySelector(".style-switcher2").classList.remove("open");
    }
})





