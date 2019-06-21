<?php
require_once('../lib/nusoap.php');

// Create the server instance
$server = new soap_server();
$server->configureWSDL('server', 'urn:server');

$server->wsdl->schemaTargetNamespace = 'urn:server';

// SOAP complex type return type (an array/struct)
$server->wsdl->addComplexType(
   'Person',
   'complexType',
   'struct',
   'all',
   '',
   array('id_user' => array('name' => 'id_user',
         'type' => 'xsd:int'))
);

// Register the "Monitorear" method to expose it
$server->register('Monitorear',
         array('name' => 'xsd:string','date' => 'xsd:string'),   // parameter
         array('return' => 'xsd:string','Disponibilidad' => 'xsd:string'),     // output
         'urn:server',                        // namespace
         'urn:server#NonitorearServer',            // soapaction
         'rpc',                               // style
         'encoded',                           // use
         'Informa disponibilidad');                   // description

// Implement the "Monitorear" method as a PHP function
function Monitorear($name,$date) {
$rnd = rand(0,100);
$Disponibilidad= $rnd/100;

	
   return array('return'=>$name,'Disponibilidad'=> $Disponibilidad);

}

// Use the request to invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)
   ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>