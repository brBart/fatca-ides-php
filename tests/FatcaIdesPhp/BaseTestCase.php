<?php

namespace FatcaIdesPhp;

class BaseTestCase extends \FatcaXsdPhp\BaseTestCase {

  public function setUp() {
    $this->di= \yaml_parse_file(__DIR__.'/fdatIndividual.yml');

    $this->conMan = $this->getMockBuilder('\FatcaIdesPhp\ConfigManager')
                   ->disableOriginalConstructor()
                   ->getMock();
    $this->conMan->config=array(
      "FatcaKeyPrivate"=>__DIR__."/../../vendor/robrichards/xmlseclibs/tests/privkey.pem",
      "FatcaCrt"=>__DIR__."/../../vendor/robrichards/xmlseclibs/tests/mycert.pem",
      // below public key extracted manually from certificate above using
      // openssl x509 -pubkey -noout -in mycert.pem  > pubkey.pem
      "FatcaKeyPublic"=>__DIR__."/pubkey.pem",
      // FATCA GIIN
      "ffaid"=>"A1BBCD.00000.XY.123",
      "ffaidReceiver"=>"000000.00000.TA.840"
    );

    parent::setUp();
  }

}
