<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try{

        include "../functions.php";
  
        $id = isLogged();
        $utype = getUtype();

        if($id && ($utype == 'p' || $utype == 'P')){

            $tgl = SQL_FIREWALL($_POST["tanggal"], 's');
            $bb = SQL_FIREWALL($_POST["bb"], 'n');
            $tb = SQL_FIREWALL($_POST["tb"], 'n');    
            $lk = SQL_FIREWALL($_POST["lk"], 'n');
            $id_anak = SQL_FIREWALL($_POST["id_anak"], 'n');      
            $catatan = SQL_FIREWALL($_POST["catatan"], 's');

            runSQL_form("


            INSERT INTO detail_anak(tanggal, bb, tb, lk, catatan, id_anak) 
            VALUES('$tgl', $bb, $tb, $lk, '$catatan', $id_anak);


            ");
            

        }else{
            messageH1("Logged Out");
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