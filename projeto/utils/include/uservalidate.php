<?php
    class UserValidate {
        public static function testarNome($paramNome) {
        if (strlen($paramNome) >= 3) {
            return true;
        }
        else {
            return false;
        }      
        }  
    
        public static function testarEmail($paramEmail) {
        /* expressao para testar sintaxe... o "i" no final é para testar case insensitive */
        $expressaoregular = "/(^[-_a-z0-9]+(\.[-_a-z0-9]+)*\@([-a-z0-9]+\.)*([a-z]{2,4})$)/i";
        
        /* função que verifica a sintaxe do e-mail: apelido@dominio */
        if(preg_match($expressaoregular, $paramEmail)) {
            $dns_mail = explode("@", $paramEmail);  /* captura o domínio */
            
            if(checkdnsrr($dns_mail[1]))  /* verifica se o domínio é válido */
            return true;
            else
            return false;
        }
        else {
            return false;
        }
        /* Vale lembrar que a função não testa se o usuário existe no domínio informado */
        }   
    }
?>