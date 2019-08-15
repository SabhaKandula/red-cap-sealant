<?php

include 'config.php';

$fields = array(
	'token'   => $GLOBALS['api_token'],
	'content' => 'record',
	'format'  => 'json',
	'type'    => 'flat'
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $GLOBALS['api_url']);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // Set to TRUE for production use
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);

$output = curl_exec($ch);
echo $output;
//formatOutput($output);
curl_close($ch);
/*
function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }
		
        if (is_array($d)) {
            /*
            * Return array converted to object
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            
            return array_map(__FUNCTION__, $d);
        }
        else {
            // Return array
            return $d;
        }
	}
	class tb{
	private $table;
	function get_table($data){
		//print_r($data);
		$this->table="<table border=\"1\">";
		foreach($data as $key=> $val){
			
			$this->table.="<tr>";
 			$this->table.="<td> $key </td>";
 	foreach($data as $row){
 		foreach($row as $value){
 			$this->table.="<td> $value </td>";
 		}
 	}
 }
    $this->table.="</tr>";
	$this->table.="</table>";
	return $this->table;
}
}
function formatOutput($responses) {
 $array = json_decode($responses, true);
   $obj=new tb();
   echo $obj->get_table($array);
}
*/