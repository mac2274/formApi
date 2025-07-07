<?php
$name = $_POST['frm_name'];
$tel = $_POST['frm_tel'];
$pwd = $_POST['frm_pwd']; 
$description = $_POST['frm_descript'];

function register($name, $tel, $pwd, $description){
    global $mysqli;

    $sql = "INSERT INTO registrations SET name=?, tel=?, pwd=?, description=?; ";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt){
        throw new Exception($mysqli->error);
    }
    $stmt->bind_param('siss', $name, $tel, $pwd, $description);
    if (!$stmt->execute()){
        throw new Exception($$stmt->error);
    }
    return $stmt->affected_rows;
}



?>