<?php
if (isset($_POST[ 'user']);
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,"http://venus:9000/login?usercode =".$_POST['user']."&password=.".$_POST['password']."$appid=5");
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);
// Will dump a beauty json :3
$data = json_decode($result, true);

$datauser =$data['data'];

echo $datauser['username']

?>
