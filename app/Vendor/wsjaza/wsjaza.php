<?php

define("WSDLJAZA", "wsjaza.wsdl");     # The WSDL corresponding to WSAA
//define("WSURL", "https://fwshomo.afip.gov.ar/wsjaza/JAZAService?wsdl");
define("WSURL", "https://serviciosjava.afip.gob.ar/wsjaza/JAZAService?wsdl");
#------------------------------------------------------------------------------
#==============================================================================

function wsjaza() {
    ini_set("soap.wsdl_cache_enabled", "0");
    ini_set('soap.wsdl_cache_ttl', 0);
//    $wsjaza = new SoapClient(WSURL);

    $wsjaza = new SoapClient(realpath(dirname(__FILE__)) . "/" . WSDLJAZA);

    return $wsjaza;
}

?>