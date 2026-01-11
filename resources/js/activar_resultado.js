"use strict";

const tipo = document.getElementById("tipo");
const resultado1 = document.getElementById("resultado1");
const resultado2 = document.getElementById("resultado2");
const resultado3 = document.getElementById("resultado3");

function evaluarCambio(valor){
    if (valor == "eliminacionDirecta") {
        resultado2.value = "";
        resultado3.value = "";
        resultado2.disabled = true;
        resultado3.disabled = true;
    }else if (valor == "idaVuelta") {
        resultado3.value = "";
        resultado2.disabled = false;
        resultado3.disabled = true;
    }else if (valor == "playOff") {
        resultado2.disabled = false;
        resultado3.disabled = false;
    }
}

evaluarCambio(tipo.value);

tipo.addEventListener("change", ()=>{

    var valor = tipo.value;

    evaluarCambio(valor);
});