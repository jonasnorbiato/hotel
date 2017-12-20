function validacao_cliente() {
    var nome = document.forms["cadastro"]["nome"].value;
    var sobrenome = document.forms["cadastro"]["sobrenome"].value;
    var cpf = document.forms["cadastro"]["cpf"].value;
    var data_nasc = new Date (document.forms["cadastro"]["data_nasc"].value);
    var sexo = document.forms["cadastro"]["sexo"].value;
    var telefone = document.forms["cadastro"]["telefone"].value;
    var email = document.forms["cadastro"]["email"].value;

    if (nome == "" || sobrenome =="" || cpf =="" || data_nasc =="" || sexo=="" || telefone =="" || email=="") {
        alert("preencha todos os campos");
        return false;
    }
    if (isNaN(telefone)) {
	    alert("preencha o campo telefone com apenas número");
	    return false;
  	}
  	if (isNaN(cpf)) {
	    alert("preencha o campo CPF com apenas número");
	    return false;
  	}
    if(cpf.length!=11){
      alert("Insirar exatamente 11 digitos no campo CPF");
      return false;
    }
  	if(isNaN(data_nasc)) {
	    alert("preencha  o campo data de nascimento com apenas número");
	    return false;
   }

    if(nome.length<2){
      alert("Insirar o nome corretamente");
      return false;
    }
    if (sobrenome.length<3) {
      alert("Insira sobrenome corretamente");
      return false;
    }

    if(telefone.length<11 || telefone.length>12){
      alert("Insirar um telefone valido, ex:  DD+numero");
      return false;
    }   
}


function consultar() {
  var periodoDia = 1000 * 60 * 60 * 24;
  var diarias = document.getElementById('txtvalor').value;
  var quantidade = document.getElementById('txtquant').value;
  document.getElementById("txttotal").value = quantidade * diarias;
  var dataI = document.getElementById('txtdataI').value;
  console.log(dataI);
  var data = new Date(dataI);
  var quant = parseInt(quantidade)+1;
  var dataF = new Date( data.getTime() + (quant * 24*60*60*1000));
  var teste = converter(dataF);
  console.log(teste);
  document.getElementById("txtdataF").value=teste;
  
  false;

}


function converter(D){
    var v = function(num) {
        var s = '0' + num;
        return s.substr(s.length - 2);
    }
    var result = D.getFullYear() + '-' + v((D.getMonth() + 1)) + '-' + v(D.getDate());
    return result;
}