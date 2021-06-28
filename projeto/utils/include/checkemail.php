<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Verifica e-mail</title>
</head>

<?php

function checkMail($email)
{
  /* expressao para testar sintaxe... o "i" no final é para testar case insensitive */
  $expressaoregular = "/(^[-_a-z0-9]+(\.[-_a-z0-9]+)*\@([-a-z0-9]+\.)*([a-z]{2,4})$)/i";
  
  /* função que verifica a sintaxe do e-mail: apelido@dominio */
  if(preg_match($expressaoregular, $email))
  {
    $dns_mail = explode("@",$email);  /* captura o domínio */
    if(checkdnsrr($dns_mail[1]))  /* verifica se o domínio é válido */
      return true;
    else
      return false;
  }
  else
  {
    return false;
  }
  /* Vale lembrar que a função não testa se o usuário existe no domínio informado */
}

if(!empty($_POST["email"]))
{
  if(checkMail($_POST["email"]))
    echo "E-mail válido";
  else
    echo "E-mail inválido";
}

?>

<body>
<form name="teste" id="teste" method="post" action="checkmail.php">
<label>Digite um endereço eletrônico aqui:</label>
<input type="text" name="email" id="email" />
<input type="submit" value="Testar" />
</form>
</body>
</html>
