<html>
<head>
<title>Siriwat Chanakhu</title>
</head>
<body>
<?php
require_once('lib/nusoap.php');

$client = new nusoap_client('http://www.quarksystems.co.th/labs/soap/server.php?wsdl');

//$client = new nusoap_client('http://localhost:88/soap/server.php?wsdl');

if(isset($_REQUEST['BoxNumber']) && isset($_REQUEST['BoxNumber']) && isset($_REQUEST['BoxNumber'])){
	$BoxNumber = $_REQUEST['BoxNumber'];
	$LoadOutID = $_REQUEST['LoadOutID'];
	$Barcode = $_REQUEST['Barcode'];
}else{
	$BoxNumber ="B01";
	$LoadOutID ="12";
	$Barcode ="654321";
}

$result = $client->call('Input_data_loadOut',array('BoxNumber'=>$BoxNumber,'LoadOutID'=>$LoadOutID,'Barcode'=>$Barcode));

if($result==="T"){ 
	$res ="<span style=\"color:green;\">T</span> ";
}else{
	$res ="<span style=\"color:red;\">F</span> ";
}
echo "<h2>Form Action</h2>";
echo "<form method=\"post\" action=\"client.php\" >";
	echo "<table style=\"border:1px solid #666; padding:10px;\"><tr style=\"background-color:#999; color:#fff;\" ><td>Parameter</td><td>Value</td></tr>";
echo "<tr><td><label for=\"BoxNumber\">BoxNumber : </label></td><td><input type=\"text\" name=\"BoxNumber\"  value=\"{$BoxNumber}\"></td></tr>";
echo "<tr><td><label for=\"LoadOutID\">LoadOutID : </label></td><td><input type=\"text\" name=\"LoadOutID\"  value=\"{$LoadOutID}\" ></td></tr>";
echo "<tr><td><label for=\"Barcode\">BarCode : </label></td><td><input type=\"text\" name=\"Barcode\"  value=\"{$Barcode}\" ></td></tr>";
echo "<tr><td>&nbsp;</td><td style=\"text-align:right;\"><input type=\"submit\" value=\"Invoke\"  ></td></tr>";
echo "</table></form><hr>";
echo "<h2>Request</h2>";
echo "<pre>" . nl2br(htmlspecialchars($client->request, ENT_QUOTES) ). "</pre>";
echo "<h2>Response $res </h2>";
echo "<pre>" . nl2br(htmlspecialchars($client->response, ENT_QUOTES)) . "</pre>";

?>
</body>
</html>