<?php
    $program = array(array("Word", "Excel"), 
            	      array("PHP", "ASP"),
	     	         array("Window 2000", "Window XP")
                );

    for($k = 0; $k < 3; ++$k){
        for($j = 0; $j < 2; ++$j){
            echo "���� �����ϴ� ���α׷��� "; 
 			echo $program[$k][$j]; 
			echo " �Դϴ�. <BR>";
        }	
    }
?>
