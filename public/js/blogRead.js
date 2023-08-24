import EditorJS from "./editor.js";
var d = document;

const contenido = d.getElementById("contenido");

const editor = new EditorJS({
  holder: "editorjs",
  readOnly: true,
  placeholder: "Empieza a escribir aqui !",
  tools: { 
    header: {
      class: Header,
      shortcut: "CMD+SHIFT+H",
    },
  },
});

editor.isReady.then(() => {
  const blocks = JSON.parse(atob(contenido.value));
  for (let i of blocks) {
    editor.blocks.insert(i.type, i.data);
  }
  editor.blocks.delete(0);
});
