<?php
 class OldMagician{
  
  public function processar($inputBrancas, $inputPretas) {
  
    $parPreta = ($inputPretas % 2);
    
    if ($parPreta == 0)
      return "White"; 
    else
      return "Black"; 
   }
   
   public function read($input) {
    $cases = explode("\n", $input);
    
    $numOfCases = $cases[0];
    
    $out = '';
    for($i = 0; $i < $numOfCases; $i++) {
      $in = explode(" ", $cases[$i+1]);
      $out .= "Case #" . ($i+1) . ": "
      . strtoupper($this->processar($in[0], $in[1]));
      if ($i < $numOfCases-1)
        $out .= "\n";
    }
    
    return $out;
   }
   
   public function readInput() {

   $out = "";  
   $fp = fopen('php://stdin', 'r');
   $limite = fgets($fp, 4096);
   
   $out .= $limite;
   
   while($line = fgets($fp, 4096)) {
        $out .= $line;
   }
   
   return $this->read($out) . "\n";
   }
   
 }
 
  $seila = new OldMagician;
  echo $seila->readInput();
 
?>
