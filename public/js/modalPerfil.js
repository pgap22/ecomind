var d = document;
const modalImagen = d.getElementById("modal-imagen");
const toggleModal = d.getElementById("toggle-modal");
const cambiarFoto = d.getElementById("cambiar-foto");
const fotoPerfil = d.getElementById("foto-perfil");
const btnImagen = d.getElementById("btn-imagen");
const fotoNombre = d.getElementById("foto-nombre");
const formActualizar = d.getElementById("actualizar-usuario");
const dropZone = d.getElementById("drop-zone");
const btnCambios = d.getElementById("btn-cambios");
const editsButtons = d.querySelectorAll(".editar-campo");

btnCambios.style.visibility = "hidden";

function modal() {
  modalImagen.classList.toggle("opacity-animar");
  if (modalImagen.classList.contains("opacity-animar")) {
    btnImagen.hidden = true;
    fotoNombre.innerHTML = "";
  }
}
function imagen({ target: { value, files } }) {
  if (value) {
    btnImagen.hidden = false;
    fotoNombre.innerHTML = files[0].name;
  }
}

function drop(e) {
  e.preventDefault();
  e.stopPropagation();
}
function dropImage(e) {
  e.preventDefault();
  const file = e.dataTransfer.files[0];
  if (file.type.startsWith("image")) {
    fotoPerfil.files = e.dataTransfer.files;
    imagen({ target: { value: true, files: e.dataTransfer.files } });
  }
}
function editar(e) {
  const field = e.target.dataset.campo;
  const pElement = d.querySelector(`[data-${field}]`);
  const inputElement = d.getElementById("campo-" + field);

  inputElement.value = pElement.innerHTML;

  if (inputElement.hidden) {
    inputElement.hidden = false;
    pElement.style.display = "none";
  } else {
    inputElement.hidden = true;
    pElement.style.display = "block";
  }

  const inputsCambios = [...d.querySelectorAll(".input-cambios")].map(
    (input) => input.hidden
  );
  if (inputsCambios.includes(false)) {
    btnCambios.style.visibility = "";
  } else {
    btnCambios.style.visibility = "hidden";
  }
}

toggleModal.onclick = modal;
cambiarFoto.onclick = modal;
btnImagen.onclick = () => formActualizar.submit();
fotoPerfil.onchange = imagen;
dropZone.ondragenter = drop;
dropZone.ondragleave = dropImage;
dropZone.ondragover = drop;
dropZone.ondrop = dropImage;
editsButtons.forEach((editButton) => {
  editButton.onclick = editar;
});
