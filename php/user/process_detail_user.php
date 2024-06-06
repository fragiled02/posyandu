<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $provinsi; $kota; $kecamatan; $kelurahan; $rt; $rw ;$no_telp; $nik;
    try{

        include "../functions.php";
  
        $id = isLogged();
        $utype = getUtype();    

        if($id && ($utype == 'o' || $utype == 'O')){
            $provinsi = SQL_FIREWALL($_POST['provinsi'], 's');
            $kota = SQL_FIREWALL($_POST['kota'], 's');
            $kecamatan = SQL_FIREWALL($_POST['kecamatan'], 's');
            $kelurahan = SQL_FIREWALL($_POST['kelurahan'], 's');
            $rt = SQL_FIREWALL($_POST['rt'], 'n');
            $rw = SQL_FIREWALL($_POST['rw'], 'n');
            $no_telp = SQL_FIREWALL($_POST['no_telp'], 's');
            $nik = SQL_FIREWALL($_POST['nik'], 's');

            $message = runSQL("SELECT id FROM detail_user WHERE id_user = $id");
            if($message == 'null' || $message == null){
                runSQL_form("

                    INSERT INTO detail_user(provinsi, kota, kecamatan, kelurahan, rt, rw, no_telp, nik, id_user) 
                    VALUES ('$provinsi', '$kota', '$kecamatan', '$kelurahan', $rt, $rw, '$no_telp', '$nik', $id);


                ");
            }else{

                runSQL_form("

                UPDATE detail_user SET
                provinsi = '$provinsi', kota = '$kota', kecamatan = '$kecamatan', kelurahan = '$kelurahan', rt = $rt, rw = $rw, no_telp = '$no_telp', nik = '$nik' 
                WHERE id_user = $id;

                ");
        

            };
         
        }else{
            echo(messageH1("Logged Out"));
        };
        exit;
    }catch(Exception $e){
        echo(messageH1($e));
    };

}else{
    include "../functions.php";
    echo(messageH1("Mana POST nya"));
    exit;
};
?>