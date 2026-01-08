"use strict";

document.addEventListener("DOMContentLoaded", ()=>{
    const alerta = document.querySelector(".success");

    if (alerta) {
        setTimeout(()=>{
            alerta.style.display = "none";
        },4000);
    }
});

