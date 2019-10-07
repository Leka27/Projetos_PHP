<?php
include("API.php");
$api_object = new API();

switch ($_GET['action']) {
    case 'fetch_all':
        $data = $api_object->fetch_all();
    break;
    
    default:
        echo "Something unexpected happened.";
        break;
}

echo json_encode($data);

?>