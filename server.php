<?php
function Input_data_loadOut($BoxNumber,$LoadOutID,$Barcode){

            if($BoxNumber && $LoadOutID && $Barcode){

                if($BoxNumber==="B01" && $LoadOutID==="12" && $Barcode==="654321"){
                    $result = "T";
                }else{
                    $result = "F";
                }
                
            }else{
                $result = "F";
            }
    
    return $result;
}


require_once('lib/nusoap.php');

$server = new soap_server();

$server->configureWSDL('connectSOAP', 'urn:connectSOAP');

$server->register('Input_data_loadOut',
    array('BoxNumber' => 'xsd:string','LoadOutID' => 'xsd:string','Barcode' => 'xsd:string'),
    array('return' => 'xsd:string'),
);

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
$server->service(file_get_contents("php://input"));
?>