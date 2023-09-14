<?php
    function validar_user_registro(){
        if(isset($_POST['register'])){
            $user_names = clean_string($_POST['user_names']);
            echo $user_names;
        }
    }
?>