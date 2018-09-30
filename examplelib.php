<?php 
include 'whmcslib.php';
$wlib = new whmcslib();
//-------Obtener todos los clientes-----------//
$clientes = $wlib->GetClients();
//-------Obtener Contraseña Encriptada por medio de correo del cliente----//
$funcionperso = $wlib->getclientpassword('','correocliente@correo.com');
//-----crear funcion personalizada de https://developers.whmcs.com/api-reference
$crearfunction = $wlib->crearfunction('GenInvoices');//obtiene las facturas
//echo var_dump($funcionperso);
 ?>