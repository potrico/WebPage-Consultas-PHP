<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            include_once("../controller/UserController.php");
            $obj = new UserController();
            $obj->controlaConsulta();
        ?>
    </body>
</html>
