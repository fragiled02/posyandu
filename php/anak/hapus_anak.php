<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "../functions.php";

    try{
        $id = isLogged();
        $utype = getUtype();

        if($id && ($utype == 'o' || $utype == 'O')){

            $data = json_decode(file_get_contents('php://input'), true);
            $data1 = SQL_FIREWALL($data["nama"], 's');
 
            echo(runSQL("

                DELETE FROM anak WHERE id_user = $id AND nama = '$data1';

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

