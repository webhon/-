<?php
   $k = 0;
   while ($k < 10) {		
	    $k++;			
	    $x = $k % 2;		
	    if ($x == 0) {  
	       continue;   	
	    }
	    $value += $k;	  	
   }
   echo "���� value�� ����� ���� $value �Դϴ�.";
?>
