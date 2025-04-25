<?php
include_once "../../../config.php";

$id = filter_input(INPUT_GET, "id");
$id = str_ireplace("w", "9", $id);
$activitySeed = (intval($id) % 133527) + 7;
mt_srand($activitySeed);
$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+[]{}|;:,.<>?/";
$charsLength = strlen($characters);
$result = new stdClass();
$result->randStr = [];

for ($j=0; $j<2; $j++) {
    $length = mt_rand(25, 40);
    $randomString = "";
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charsLength - 1)];
    }
    array_push($result->randStr, $randomString);
}

//$result->randStr = $randomString;

if (substr($id, 0, 1) == '9') {
   $id = "W".substr($id, -7);
}
$db = connect_db();
log_access($db, 'rand_string.php', $id);

echo json_encode($result);
?>
