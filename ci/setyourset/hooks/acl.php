<?php
$allowAll = array();
$allowOnly = array();
$allowAll['pages']['view'] = True;
$allowAll['pages']['index'] = True;
$allowAll['pages']['faq'] = True;
$allowAll['content']['test'] = True;
$allowAll['User']['login'] = True;
$allowAll['User']['logout'] = True;
$allowAll['User']['authenticate'] = True;
$allowAll['User']['_set_session'] = True;
$allowAll['User']['register'] = True;
$allowAll['DMGcalculator']['register'] = True;
// $allowOnly[group][controller][action]
// 1 -> admin; 2 -> registered users
$allowOnly[2]['DMGcalculator']['dmgcalc'] = True;
$allowOnly[2]['DMGcalculator']['itemSet'] = True;
$allowOnly[2]['User']['settings'] = True;
$allowOnly[2]['User']['changeMail'] = True;
$allowOnly[2]['User']['changePass'] = True;
$allowOnly[2]['User']['settings'] = True;
?>