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
            $oldNama = SQL_FIREWALL($_POST["oldNama"], 's');

            runSQL_form("


            UPDATE anak SET nama='$nama', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir'
            WHERE id_user = $id AND nama = '$oldNama';


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