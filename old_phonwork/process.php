<?php
function safe_post_param($p, $maxlen) {
  if (isset($_POST[$p]) && preg_match("/^[a-zA-Z0-9 \.-_]{1,$maxlen}$/", $_POST[$p])) {
    $val = $_POST[$p]; 
  } else { $val = '<invalid>'; }
  return $val;
}

$datafile = 'messages.csv';

$form_params['name'] = 30;
$form_params['email'] = 50;
$form_params['message'] = 10000;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formdata = [];
  foreach($form_params as $p=>$maxlen) {
      array_push($formdata, safe_post_param($p, $maxlen));
  }
  $data = join(",", $formdata) . "\n";
  $ret = file_put_contents($datafile,$data,FILE_APPEND| LOCK_EX);
  if (! $ret) {
     throw new Exception("error on file_put_contents()");
  }
} 

?>
