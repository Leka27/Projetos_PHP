<?php

$api_url = "192.168.100.71:8100/crud_php_api/api/test_api.php?action=fetch_all";
$client = curl_init($api_url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response);
echo "result:$responde";
$output = "";
if(count($result)>0){
    foreach ($result as $row) {
       $output.="
        <tr>
            <td>".$row->C003_Nome."</td>
            <td>".$row->C003_Login."</td>
            <td><button type='button' name='edit' class='btn btn-warning btn-xs edit' id='".$row->C003_Id."'>Edit</button></td>
            <td><button type='button' name='delete' class='btn btn-danger btn-xs delete' id='".$row->C003_Id."'>Delete</button></td>
        </tr>
       ";
    }
}else{
    $output .= "
    <tr>
        <td colspan='4' align='center'>No data found</td>
    </tr>";
}

echo $output;

?>