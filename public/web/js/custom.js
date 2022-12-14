var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
    },
});


// ------------------ Start Go To Top
let ScrolTop = document.querySelector(".go-top"),
    body = document.querySelector("html , body");
window.addEventListener("scroll", () => {
    if (body.scrollTop >= 200) {
        ScrolTop.style.display = "block";
        ScrolTop.addEventListener("click", () => {
            window.scrollTo(0, 0);
        });
    } else {
        ScrolTop.style.display = "none";
    }
});
// ------------------ End Go To Top


// ------------------ Start side menu
let sideMenu = document.querySelector('.side_menu'),
    overlayMenu = document.querySelector('.overlay-menu'),
    btnMenu = document.querySelectorAll('.menu_icon');

for (let i = 0; i < btnMenu.length; i++) {
    btnMenu[i].addEventListener('click', () => {
        sideMenu.classList.add('open')
        overlayMenu.classList.add('showOverlayBlock')
        setTimeout(function () {
            overlayMenu.classList.add('showOverlayOpacity');
        }, 100);
    })
}

overlayMenu.addEventListener('click', () => {
    sideMenu.classList.remove('open')
    overlayMenu.classList.remove('showOverlayOpacity')
    setTimeout(function () {
        overlayMenu.classList.remove('showOverlayBlock');
    }, 700);
})

let colocController = document.getElementById('coloc_controller'),
    navContent = document.querySelector('.nav_content'),
    test = document.querySelector('.categories .cat_box .cat_box_content .main_cat p');
colocController.addEventListener('change', () => {
    navContent.style.backgroundColor = colocController.value
    test.style.backgroundColor = colocController.value
})
// ------------------ End side menu


// ------------------ Start Sticky Navbar
let stickyNavbar = document.querySelector('.sticky_navbar');
window.addEventListener('scroll', () => {
    if (body.scrollTop >= 100) {
        stickyNavbar.style.display = "block"
        stickyNavbar.classList.remove('animate__animated', 'animate__fadeInUp')
        stickyNavbar.classList.add('animate__animated', 'animate__fadeInDown')
    } else {
        stickyNavbar.classList.remove('animate__animated', 'animate__fadeInDown')
        stickyNavbar.classList.add('animate__animated', 'animate__fadeInUp')
        stickyNavbar.style.display = "none"
    }
})
// ------------------ End Sticky Navbar


// ------------------ Start Active Link
let navLink = document.querySelectorAll('.navLink');
for (let i = 0; i < navLink.length; i++) {
    navLink[i].addEventListener('click', () => {
        navLink[i].classList.add('active');
    })
}
// ------------------ End Active Link