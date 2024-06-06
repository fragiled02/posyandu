<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try{

        include "../functions.php";

        $utype = getUtype();
        $id = isLogged();

        if($id && ($utype == 'p' || $utype == 'P')){
            $data = json_decode(file_get_contents('php://input'), true);
            $idd = SQL_FIREWALL($data["id"], 'n');
  
            echo(runSQL("


            SELECT nama, jenis_kelamin, tanggal_lahir, id FROM anak WHERE id_user = $idd;


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