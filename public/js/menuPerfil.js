var d = document;
const toggleMenu = d.getElementById("toggle-menu");
const bgBlack = d.getElementById("bg-mobile");
const mobileMenu = d.getElementById("menu-mobile");



function menuMobile() {
  bgBlack.classList.toggle("opacity-animar");
  mobileMenu.classList.toggle("esconder-menu-perfil");
}

toggleMenu.onclick = menuMobile;
bgBlack.onclick = menuMobile;


