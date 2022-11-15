<?php

require_once '../../back/class/user.php';

$user = new User();
$user->conectar('search-devs_base', 'localhost', 'root', '');

if ($user->msg == "") {
    $sql = $pdo->prepare("SELECT * FROM `area`");
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $return = $sql->fetchAll(PDO::FETCH_ASSOC);


        foreach($return as &$value) {
            echo "<option value='" . $value['Area_name']. "' id='". $value['Area_ID']. "' >";
        }
    }
}

?>
