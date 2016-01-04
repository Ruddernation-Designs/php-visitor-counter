<?php
// RudderCount - Created by Ruddernation Design™ - https://www.ruddernation.com
// A the script to your selected page to start counting the number of visits you get,
// To display the counter add - Visitors: echo $Rcounter_count to the area.
$Rcounter_digit = 5; 
$Rcounter_dpath = "/visitors"; 
$Rcounter_fpath = "visitors/visits.txt"; 
// Check if directory and file exists, if not then create it.
if (!file_exists($Rcounter_fpath)) {
  if (!is_dir($Rcounter_dpath)) {
    mkdir($Rcounter_dpath, 0700);
  }
  $Rcounter_fso = fopen($Rcounter_fpath,"w");
  flock($Rcounter_fso, 2);
  fputs($Rcounter_fso, 0);
  flock($Rcounter_fso, 3);
  fclose($Rcounter_fso);
}
$Rcounter_fso = fopen($Rcounter_fpath,"r+");
$Rcounter_count = fgets($Rcounter_fso, 4096);
session_start();
if (!isset($HTTP_SESSION_VARS["Rcounter_DataCounter"])) {
  fseek($Rcounter_fso, 0);
  flock($Rcounter_fso, 2);
  fputs($Rcounter_fso, $Rcounter_count+1);
  flock($Rcounter_fso, 3);
  fclose($Rcounter_fso);
  $Rcounter_count++;
  $Rcounter_DataCounter = $Rcounter_count;
}
$Rcounter_numlength = strlen((string) $Rcounter_count);
if ($Rcounter_numlength < $Rcounter_digit) {
  $Rcounter_lead = (int) $Rcounter_digit - $Rcounter_numlength;
  for ($i=0; $i<$Rcounter_lead; $i++) {
    $Rcounter_count = "0" . $Rcounter_count;  }} ?>
