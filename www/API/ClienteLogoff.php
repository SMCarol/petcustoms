<?php 

    namespace LOJA\API;

    class ClienteLogoff{

        function __construct(){

            unset($_SESSION['clienteid']);
            unset($_SESSION['clienteemail']);
            unset($_SESSION);
            header("location: http://localhost/petcustoms/www/home/");
        }
    }

?>