var d = document;

const blackScreen = d.getElementById("black-screen");
const foroID = d.getElementById("foro-id")

function toggleModal(){
    blackScreen.classList.toggle("opacity-animar")
}

function eliminarModal(e){
    const {id} = e.dataset;
    foroID.value = id;
    toggleModal();
}