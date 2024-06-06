<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try{

        include "../functions.php";

        $id = isLogged();
       
        if($id){

  
            echo(runSQL("


            SELECT nama, jenis_kelamin, tanggal_lahir, id FROM anak WHERE id_user = $id;


            "));
            
        }else{
            echo(dummyJSON("Logged Out"));
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