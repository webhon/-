<?php
    $data1 = "���� ����"; 

   function myfunc() { 
       global $data1;
       $data1 = "���� ����"; 

       echo "$data1 <BR><BR>";  
   } 

   myfunc ();
   echo $data1;
?>
