<?php

# Author: Gerardo Fisanotti - DvSHyS/DiOPIN/AFIP - 13-apr-07
# Function: Get an authorization ticket (TA) from AFIP WSAA
# Input:
#        WSDL, CERT, PRIVATEKEY, PASSPHRASE, SERVICE, URL
#        Check below for its definitions
# Output:
#        TA.xml: the authorization ticket as granted by WSAA.
#==============================================================================
//define("WSDL", ROOT . DS . APP_DIR . DS . 'Vendor' . DS . "wsaa.wsdl");     # The WSDL corresponding to WSAA
define("WSDL", "wsaa.wsdl");     # The WSDL corresponding to WSAA
//define("CERT", ROOT . DS . APP_DIR . DS . 'Vendor' . DS . "certificadofirmado.crt");       # The X.509 certificate in PEM format
//define("CERT", "../Vendor/certificadofirmado.crt");       # The X.509 certificate in PEM format
define("CERT", "certificadofirmado.crt");       # The X.509 certificate in PEM format
//define("CERT", "testing.crt");       # The X.509 certificate in PEM format
//define("CERT", "produccion.crt");       # The X.509 certificate in PEM format
//define("CERT", "certificadofirmado.pem");       # The X.509 certificate in PEM format
//define("PRIVATEKEY", ROOT . DS . APP_DIR . DS . 'Vendor' . DS . "claveprivadaCPSF.key"); # The private key correspoding to CERT (PEM)
//define("PRIVATEKEY", "../Vendor/claveprivadaCPSF.key"); # The private key correspoding to CERT (PEM)
define("PRIVATEKEY", "claveprivadaCPSF.key"); # The private key correspoding to CERT (PEM)
define("PASSPHRASE", ""); # The passphrase (if any) to sign
define("PROXY_HOST", ""); # Proxy IP, to reach the Internet
define("PROXY_PORT", "80");            # Proxy TCP port
//define("URL", "https://wsaahomo.afip.gov.ar/ws/services/LoginCms");            # Testing
define ("URL", "https://wsaa.afip.gov.ar/ws/services/LoginCms");            # Producción
#------------------------------------------------------------------------------
# You shouldn't have to change anything below this line!!!
#==============================================================================

function CreateTRA($SERVICE) {
    $TRA = new SimpleXMLElement(
                    '<?xml version="1.0" encoding="UTF-8"?>' .
                    '<loginTicketRequest version="1.0">' .
                    '</loginTicketRequest>');
    $TRA->addChild('header');
    $TRA->header->addChild('uniqueId', date('U'));
    $TRA->header->addChild('generationTime', date('c', date('U') - 60));
    $TRA->header->addChild('expirationTime', date('c', date('U') + 60));
    $TRA->addChild('service', $SERVICE);
    $TRA->asXML(realpath(dirname(__FILE__)) . '/TRA.xml');
}

#==============================================================================
# This functions makes the PKCS#7 signature using TRA as input file, CERT and
# PRIVATEKEY to sign. Generates an intermediate file and finally trims the 
# MIME heading leaving the final CMS required by WSAA.

function SignTRA() {

//    $data = <<<EOD
//
//You have my authorization to spend $10,000 on dinner expenses.
//
//The CEO
//EOD;
//// save message to file
//    $fp = fopen(realpath(dirname(__FILE__)) . '/TRA.xml', "w");
//    fwrite($fp, $data);
//    fclose($fp);
//
//
//    $data = <<<EOD
//
//You have my authorization to spend $10,000 on dinner expenses.
//
//The CEO
//EOD;
//// save message to file
//    $fp = fopen(realpath(dirname(__FILE__)) . '/TRA.tmp', "w");
//    fwrite($fp, $data);
//    fclose($fp);

    $prepend = "file://";

//    debug($prepend . realpath(dirname(__FILE__)) . "/" . PRIVATEKEY);
//    debug($prepend . realpath(dirname(__FILE__)) . "/" . CERT);

//    $cert = openssl_x509_read($prepend . realpath(dirname(__FILE__)) . "/" . CERT);


//    debug("HOLA");
    $STATUS = openssl_pkcs7_sign(realpath(dirname(__FILE__)) . '/TRA.xml', realpath(dirname(__FILE__)) . '/TRA.tmp', $prepend . realpath(dirname(__FILE__)) . "/" . CERT,
                    array($prepend . realpath(dirname(__FILE__)) . "/" . PRIVATEKEY, PASSPHRASE),
                    array(),
                    !PKCS7_DETACHED
    );

    /*
      $STATUS = openssl_pkcs7_sign("TRA.xml", "TRA.tmp", "file://" . CERT,
      array("file://" . PRIVATEKEY, PASSPHRASE),
      array(),
      !PKCS7_DETACHED
      );
     */

    if (!$STATUS) {
        exit("ERROR generating PKCS#7 signature\n");
    }
    $inf = fopen(realpath(dirname(__FILE__)) . '/TRA.tmp', "r");
    $i = 0;
    $CMS = "";
    while (!feof($inf)) {
        $buffer = fgets($inf);
        if ($i++ >= 4) {
            $CMS.=$buffer;
        }
    }
    fclose($inf);
#  unlink("TRA.xml");
    unlink(realpath(dirname(__FILE__)) . '/TRA.tmp');
    //print_r($CMS);die()
    return $CMS;
}

#==============================================================================

function CallWSAA($CMS) {
    $client = new SoapClient(realpath(dirname(__FILE__)) . "/" .  WSDL);
    $results = $client->loginCms(array('in0' => $CMS));
    //print_r($results);die();
    file_put_contents("request-loginCms.xml", $client->__getLastRequest());
    file_put_contents("response-loginCms.xml", $client->__getLastResponse());
    if (is_soap_fault($results)) {
        exit("SOAP Fault: " . $results->faultcode . "\n" . $results->faultstring . "\n");
    }
    return $results->loginCmsReturn;
}

#==============================================================================

function ShowUsage($MyPath) {
    printf("Uso  : %s Arg#1 Arg#2\n", $MyPath);
    printf("donde: Arg#1 debe ser el service name del WS de negocio.\n");
    printf("  Ej.: %s wsfe\n", $MyPath);
}

#==============================================================================

function wsaa() {
    ini_set("soap.wsdl_cache_enabled", "0");
    if (!file_exists(realpath(dirname(__FILE__)) . "/" . CERT)) {
        exit("Failed to open " . CERT . "\n");
    }
    if (!file_exists(realpath(dirname(__FILE__)) . "/" . PRIVATEKEY)) {
        exit("Failed to open " . PRIVATEKEY . "\n");
    }
    if (!file_exists(realpath(dirname(__FILE__)) . "/" . WSDL)) {
        exit("Failed to open " . WSDL . "\n");
    }
//if ( $argc < 2 ) {ShowUsage($argv[0]); exit();}
//$SERVICE=$argv[1];
    CreateTRA('wsjaza');
    $CMS = SignTRA();
    $TA = CallWSAA($CMS);
    if (!file_put_contents(realpath(dirname(__FILE__)) . "/" . "TA.xml", $TA)) {
        exit();
    }
}

function prueba() {
    echo "HOLA VENDOR";
    $prepend = "file://";
    debug($prepend . realpath(dirname(__FILE__)) . "/" . PRIVATEKEY);
    debug($prepend . realpath(dirname(__FILE__)) . "/" . CERT);
}

?>
