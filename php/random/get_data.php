<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try{

        include "../functions.php";
  
        $id = isLogged();

        if($id){

            echo(runSQL("


            SELECT data1 FROM testing WHERE id_user = $id;


            "));
        }else{
            echo(dummyJSON(""));
        };
        exit;
    }catch(Exception $e){
        echo(dummyJSON("Error: $e"));
    };

}else{
    include "../functions.php";
    echo(messageH1("Mana POST nya"));
    exit;
};
?>