<?php

  /**
   * Alright, this is where what your daughter is worth is calculated
   * What we currently know...
   * 1 cow is worth 20 pigs
   * 1 pig is worth 100 chickens
   */

  // catch stuff from the AJAX post
  $attr = "";  if(isset($_POST['attr'])) { $attr = $_POST['attr']; }
  $religion = "";  if(isset($_POST['religion'])) { $religion = $_POST['religion']; }
  $education = "";  if(isset($_POST['education'])) { $education = $_POST['education']; }

  // calculate chicken value from attributes (1 cow is 2000 chickens)
  // this will be updated / changed
  $value = 0;
  if($religion == "hinduism") { $value += 2000; }
  if($education == "bs_d" || $education == "ms_d") { $value += 2000; }
  if($education == "hs") { $value += 140; }
  if($education == "hs_drop") { $value += 30; }
  if($attr == "5") { $value += 2000; }
  if($attr == "4") { $value += 1600; }
  if($attr == "3") { $value += 1200; }
  if($attr == "2") { $value += 800; }
  if($attr == "1") { $value += 400; }

  // Convert chickens value to cows, pigs, and chickens
  $cows = 0; $pigs = 0; $chickens = 0;
  $cows = floor($value / 2000);
  if($cows >= 1) { $value = $value % 2000; }
  $pigs = floor($value / 100);
  if($pigs >= 1) { $value = $value % 100; }
  $chickens = floor($value);

  // create and concatenate return string
  $returnStr = "";
  if($cows == 1) { $returnStr .= $cows . " cow<br>"; }
  elseif ($cows > 1) { $returnStr .= $cows . " cows<br>"; }
  if($pigs == 1) { $returnStr .= $pigs . " pig<br>"; }
  elseif ($pigs > 1) { $returnStr .= $pigs . " pigs<br>"; }
  if($chickens == 1) { $returnStr .= $chickens . " chicken<br>"; }
  elseif ($chickens > 1) { $returnStr .= $chickens . " chickens<br>"; }
  if($cows + $pigs + $chickens <= 0) { $returnStr .= "...yeah, she's not worth anything..."; }

  // return result
  echo $returnStr;

?>
