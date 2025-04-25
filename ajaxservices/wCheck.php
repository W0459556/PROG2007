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


/*
$freeSize = ['bytes', 'kibibytes', 'mebibytes', 'gibibytes'];
shuffle($freeSize);
if (rand(0,100) < 90) {
    $count = 1;
}
else {
    $count = 3;
}
$result->free = new stdClass();
$result->free->units = $freeSize[0];
$result->free->count = $count;
////////////////////////////////////////////
$sections = [ "NAME", "SYNOPSIS", "DESCRIPTION", "AUTHOR", "COPYRIGHT", "SEE ALSO" ]

$db = connect_db();
$getPages = $db->prepare("
    select command from linux_command
    order by rand($activitySeed)
    limit 5
");
$getPages->execute();
$commandList = $getPages->fetchAll(PDO::FETCH_COLUMN);
$getPages->closeCursor();

$result->commands = [];
foreach ($commandList as $cmd) {
    $temp = new stdClass();
    $temp->name = $cmd;
    $temp->section = $sections[rand(0,5)];
    array_push($result->commands, $temp);
}

*/

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
log_access($db, 'lab1.php', $id);

echo json_encode($result);
?>
