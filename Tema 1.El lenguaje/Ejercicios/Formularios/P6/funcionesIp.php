<?php

function comprobar($ip){
  if($ip<0 || $ip>255){
    return false;
  }//de if
  else{
    return true;
  }//de else
}//de fucntion

function aBinario($ip){
  return decbin($ip);
}

 ?>
