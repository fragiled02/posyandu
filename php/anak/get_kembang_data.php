<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try{

        include "../functions.php";

        $id = isLogged();
       
        if($id){
            $data = json_decode(file_get_contents('php://input'), true);
            $idd = SQL_FIREWALL($data["id"], 'n');
  
            echo(runSQL("


            SELECT tanggal, detail_anak.bb, detail_anak.tb, detail_anak.lk, detail_anak.catatan, anak.tanggal_lahir 
            FROM detail_anak 
            LEFT JOIN anak on detail_anak.id_anak = anak.id 
            WHERE id_anak = $idd;


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