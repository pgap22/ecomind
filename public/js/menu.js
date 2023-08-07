const d = document;

const toggleMenu = d.getElementById("toggle-menu");
const bgBlack = d.getElementById("bg-mobile");
const mobileMenu = d.getElementById("menu-mobile");

function menuDropdown(usuariomenu_id, usuarioopciones_id) {
  const usuarioMenu = d.getElementById(usuariomenu_id);
  const usuarioOpciones = d.getElementById(usuarioopciones_id);

  if (usuarioMenu) {
    usuarioOpciones.onclick = function () {
      if (usuarioMenu.classList.contains("hidden")) {
        usuarioMenu.classList.add("flex");
        usuarioMenu.classList.remove("hidden");
      } else {
        usuarioMenu.classList.remove("flex");
        usuarioMenu.classList.add("hidden");
      }
    };
  }
}

menuDropdown("usuario-menu-mobile","usuario-opciones-mobile")
menuDropdown("usuario-menu","usuario-opciones")


function menuMobile() {
  bgBlack.classList.toggle("opacity-animar");
  mobileMenu.classList.toggle("esconder-menu");
}

toggleMenu.onclick = menuMobile;
bgBlack.onclick = menuMobile;
