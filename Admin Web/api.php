<?php
if(isset($_POST['salename'])){
	$ch = curl_init();
	// Disable SSL verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// Will return the response, if false it print the response
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Set the url
	curl_setopt($ch, CURLOPT_URL,"http://venus.nopadol.com:3000/employees?access_token=&keyword=".$_POST['salename']."");
	// Execute
	$result=curl_exec($ch);
	// Closing
	curl_close($ch);
	// Will dump a beauty json :3
	//var_dump(json_decode($result, true));
	$data = json_decode($result, true);
	$datauser = $data['data'][0];
	//$datacod = $data['menucode'];
	echo $datauser['sale_name'];
	//var_dump($data);
	//echo $datacod['menucode'];
}
?>
<form method="post">
	<input type="text" name="salename">
    <button type="submit">Submit</button>
</form>