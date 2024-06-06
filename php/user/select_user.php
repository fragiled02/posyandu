<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try{

        include "../functions.php";
  
        $id = isLogged();
        $utype = getUtype();

        if($id){

            $data = json_decode(file_get_contents('php://input'), true);
            $nama = SQL_FIREWALL($data["nama"], 's');
            $searchMethod = SQL_FIREWALL($data["sm"], 's');
            $nama1;

            if(empty($nama)){
                $nama1 = "encrpted_no_one_will_get_this";
            }else{
                $nama1 = $nama;
            };

            if($searchMethod == '0' || $searchMethod == 0){
                echo(runSQL("

                    SELECT name, id
                    FROM users
                    WHERE name LIKE '%$nama1%' AND utype LIKE '%o%';
            
                "));

            }else if($searchMethod == '1' || $searchMethod == 1){
                echo(runSQL("

                    SELECT name, id
                    FROM users
                    WHERE email LIKE '%$nama1%' AND utype LIKE '%o%';
            
                "));

            }else if($searchMethod == '2' || $searchMethod == 2){
                echo(runSQL("

                    SELECT name, id
                    FROM users
                    WHERE id IN (SELECT id_user FROM detail_user WHERE nik LIKE '%$nama1%') AND utype LIKE '%o%';
            
                "));
            };

            exit();



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