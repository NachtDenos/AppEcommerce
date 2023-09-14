const email = document.getElementById("emailLog")
const pass = document.getElementById("passLog")
const form = document.getElementById("formLogin")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e=> {
    e.preventDefault()
    let warnings = ""
    let entrar = false
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    parrafo.innerHTML = ""
    if(regexEmail.test(email.value)){
        warnings += 'El email no es valido <br>'
        entrar = true
    }
    if(pass.value.length < 8){
        warnings += 'La contraseña no es valida <br>'
        entrar = true
    }

    if (entrar){
        parrafo.innerHTML = warnings
    }
})