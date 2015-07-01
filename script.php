<?php
// RudderCount - Created by Ruddernation Design™ 2015 - https://www.ruddernation.com
// A the script to your selected page to start counting,
// To display the counter add - Visitors: echo $Rcounter_count to the area.
$Rcounter_digit = 7;
$Rcounter_dpath = "Path to directory! : Example ../visitors";
$Rcounter_fpath = "Path to text file: example ../visits.txt";
// Check if directory and file exists, if not then create it.
if (!file_exists($Rcounter_fpath)) {
  if (!is_dir($Rcounter_dpath)) {
    mkdir($Rcounter_dpath, 0700);
  }
  $Rcounter_fso = fopen($Rcounter_fpath,"w");
  flock($Rcounter_fso, 2);
  fputs($Rcounter_fso, 0); // Start number for counter.
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
