function mascaraCpf(){
    var cpf = document.getElementById('#cpfId')

    if(cpf.value.lenght == 3 || cpf.value.lenght == 7) {
        cpf.value += "."
    } else if(cpf.value.lenght == 11) {
        cpf.value += "-"
    }
}