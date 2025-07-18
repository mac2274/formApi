<?php
require_once 'config/config.db.php';

global $mysqli;
$sql = "INSERT INTO registrations SET name=?, tel=?, pwd=?, description=? ";
$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    throw new Exception($mysqli->error);
}
$stmt->bind_param('siss', $_POST['frm_name'], $_POST['frm_tel'], $_POST['frm_pwd'], $_POST['frm_descript']);
if (!$stmt->execute()){
    throw new Exception($stmt->error);
} else {
    echo 'Erfolgreich registriert.';
}

return $stmt->affected_rows;

?>