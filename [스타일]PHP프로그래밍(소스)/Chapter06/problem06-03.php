<?
      $email = "lee@phpschool.ac.kr" ;

      if (ereg("([_a-zA-Z][_a-zA-Z0-9]*)@(([a-zA-Z0-9_\-]*\.){1,2}[a-zA-Z0-9_\-]*)", $email, $matchdata)) {
	   echo "���̵� : $matchdata[1] <BR>" ;
	   echo "������ �̸� : $matchdata[2] <BR>" ;
      }
	  else echo "ã�� ������ �����ϴ�. " ;
?>