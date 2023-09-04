

//função que atualiza a página com upload da foto enviada pelo usuário.

function readURL(input) {
  var fileTypes = ['jpg', 'jpeg'];  //tipos de arquivos que podem ser aceitos
  if (input.files && input.files[0]) {
    var extension = input.files[0].name.split('.').pop().toLowerCase(),  //extensão do arquivo no input file
      isSuccess = fileTypes.indexOf(extension) > -1;  //a extensão do arquivo está presente na lista de extensões aceitáveis?

    if (isSuccess) { //yes
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#idFotoTecnologo').attr('src', e.target.result).width(reader.width * 0.3).height(250);
      }

      reader.readAsDataURL(input.files[0]);
    } else {
      alert('Apenas imagens em formato jpg ou jpeg são aceitas.');
      document.getElementById("idFoto").value = "";
      document.getElementById("idFotoTecnologo").value = "";
      $('#idFotoTecnologo').attr('src', "");
    }
  }
}

//função que limita a quantidade de caracteres que podem ser digitados.
function countChar(val) {
  var len = val.value.length;
  var txtAreaId = val.id;
  if (len >= 10000) {
    val.value = val.value.substring(50, 10000);
  } else {
    $('#charNum' + txtAreaId).text("Limite de caracteres: " + (500 - len) + "/500");
  }
};

//mascaras para os campos Celular e Idade.
$("#idCelular").mask("(00) 00000-0000");
$("#idIdade").mask("000");

function terms_changed(termsCheckBox) {
  //Se o usuário não confirmar no checkbox que concorda com os termos de uso de imagem e informação,
  //o botão de enviar informações fica desativado.
  if (termsCheckBox.checked) {
    document.getElementById("btnEnviar").disabled = false;
  } else {
    document.getElementById("btnEnviar").disabled = true;
  }
}

window.onload = function listarAnos() {
  var max = new Date().getFullYear(),
    currentMonth = new Date().getMonth(),
    select = document.getElementById('idSelectAno');

  //A partir do mês 7 do ano atual, libera o ano atual como opção para a escolha.
  if (currentMonth <= 7) {
    max = max - 1;
  }

  //Laço de repetição que limita a escolha do ano de formação até 2002
  //(2002 é o ano de fundação da FATEC-ZL).
  for (var i = max; i >= 2002; i--) {
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
  }

  $('#idSelectAno').change(function () {

    //força o usuario a escolher primeiramente um ano de formação, para então
    //escolher o semestre em que se formou
    if (this.value == '') {
      $('#idPrimeiroSemestre').attr('disabled', true);
      $('#idSegundoSemestre').attr('disabled', true);
    } else {
      $('#idPrimeiroSemestre').attr('disabled', false);
      $('#idSegundoSemestre').attr('disabled', false);
    }

    //Se o ano de formação for o ano atual, o tecnólogo só pode escolher o primeiro semestre
    if (this.value == new Date().getFullYear()) {
      $('#idSegundoSemestre').attr('disabled', true);
    }

  });

}
