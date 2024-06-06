<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try{

        include "../functions.php";
  
        $id = isLogged();
        $utype = getUtype();

        if($id && ($utype == 'o' || $utype == 'O')){

            $nama = SQL_FIREWALL($_POST["nama"], 's');
            $jenis_kelamin = SQL_FIREWALL($_POST["jenis_kelamin"], 's');    
            $tanggal_lahir = SQL_FIREWALL($_POST["tanggal_lahir"], 's');
          
            runSQL_form("


            INSERT INTO anak(nama, jenis_kelamin, tanggal_lahir, id_user) 
            VALUES('$nama', '$jenis_kelamin', '$tanggal_lahir', $id);


            ");
            

        }else{
            echo(messageH1("Logged Out"));
        };
        exit;
    }catch(Exception $e){
        echo(messageH1("Error: $e"));
    };

}else{
    include "../functions.php";
    echo(messageH1("Mana POST nya"));
    exit;
};
?>