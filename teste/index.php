<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://irql.bipbop.com.br/js/jquery.bipbop.min.js"></script>
</head>
<body>
	<input type="text" name="cpf" id="cpf" placeholder="CPF"></input>
	<input type="text" name="nome" id="nome" placeholder="Nome" disabled="disabled"></input>

	<script type="text/javascript">
		function validCPF (cpf) {
  return cpf.match(/^\d{3}\.?\d{3}\.?\d{3}\-?\d{2}$/);
}

// quando o usuário digitar no campo CPF
$('#cpf').keyup(function(){
  var cpf = this.value;

  // se o CPF tiver formatação válida
  if (validCPF(cpf)) {

    // consulta a API da BIPBOP com uma chave gratuita
    // a constante BIPBOP_FREE é uma chave da BIPBOP e
    //    é definida ao carregar a biblioteca JS da BIPBOP
    $().bipbop("SELECT FROM 'BIPBOPJS'.'CPFCNPJ'", BIPBOP_FREE, {
      // passando o CPF digitado
      data: { documento: cpf },

      success: function(data) {
        // define a variável "nome" com
        //    o nome da pessoa física associada ao CPF
        var nome = $(data).find("body nome").text();
        
        // muda o campo "nome" para o nome do dono do CPF
        $("#nome").val(nome);
      }
    });
  }
});
	</script>

</body>
</html>