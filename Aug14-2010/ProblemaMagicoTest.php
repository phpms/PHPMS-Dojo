<?php

require_once 'PHPUnit/Framework.php';
require_once 'OldMagician.php';
class MagicoTest extends PHPUnit_Framework_TestCase {
 
 public function testarEntradaTresBrancasUmaPreta () {
 
    $instance = new OldMagician();
    $inputBrancas = 3;
    $inputPretas = 1;
    $output = $instance->processar($inputBrancas, $inputPretas);
    $this->assertEquals($output,"Black");
 }
 
 public function testarEntradaDuasPretas () {
 
    $instance = new OldMagician();
    $inputBrancas = 0;
    $inputPretas = 2;
    $output = $instance->processar($inputBrancas, $inputPretas);
    $this->assertEquals($output,"White");
 }
 
  public function testarEntradaTresBrancasSeisPretas () {
 
    $instance = new OldMagician();
    $inputBrancas = 3;
    $inputPretas = 6;
    $output = $instance->processar($inputBrancas, $inputPretas);
    $this->assertEquals($output,"White");
 }
 
 public function testarLeituraDeInput()  {
    $input = "2\n3 1\n3 6";
    $instance = new OldMagician();
    
    $output = $instance -> read($input);
   
    $this->assertEquals("Case #1: BLACK\nCase #2: WHITE", $output);
  }
  
}
