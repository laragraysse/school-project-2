//scripts e funcoes

function validarIndex(){
    var id = document.getElementById("id");
    var isbn = document.getElementById("isbn");
    var titulo = document.getElementById("titulo");
    var autor = document.getElementById("autor");
    var categoria = document.getElementById("categoria");
    var ano = document.getElementById("ano");
    var editora = document.getElementById("editora");

    if(id.value == "" || isNaN(id.value) == 1){
        alert("Introduza um ID válido");
        return false;
    }
    else if(isbn.value == ""){
        alert("Introduza um ISBN com 13 caractéres");
        return false;
    }
    else if(isNaN(isbn.value) == 1){
        alert("Introduza um ISBN válido");
        return false;
    }
    else if(titulo.value == ""){
        alert("Introduza um título");
        return false;
    }
    else if(autor.value == ""){
        alert("Introduza um autor");
        return false;
    }
    else if(categoria.value == ""){
        alert("Introduza uma categoria");
        return false;
    }
    else if(ano.value == "" || isNaN(ano.value) == 1){
    alert("Introduza um ano com 4 caractéres");
        return false;
    }
    else if(editora.value == ""){
        alert("Introduza uma editora");
        return false;
    }
}