<?php

$url;             			   //����ڰ� ������ URL�� �ڵ����� ��$url������ �Ҵ�

if(!$url) { }                           //URL�� ��������� �ƹ��� �۾��� ���� ����
else {	                      
	$rst=shell_exec("ping $url"); 
 //URL �ּҰ� �ִ� ��쿡�� shell�� ���ؼ� ping ����� �����Ͽ� ��$rst�� �Ҵ�

	$rst=str_replace("Reply","<br>Reply",$rst);
	$rst=str_replace("Ping statistics","<br><br>Ping statistics",$rst);
	$rst=str_replace("Packets","<br>&nbsp;&nbsp;&nbsp;Packets",$rst);
	$rst=str_replace("Approximate","<br>Approximate",$rst);
	$rst=str_replace("Minimum","<br>&nbsp;&nbsp;&nbsp;Minimum",$rst);
	$rst=str_replace("Request","<br>Request",$rst);
   //ping ����� ����� ���� ���ϵ��� ���ڿ� ��ȯ�� ������
}
?>

<html>
<head><title></title></head>

<body>
  <form name='frm' action='ping_test.php' method='post'>
   <!-- ping ����� ������ url�� �Է��ϴ� form ���� -->

<table border='1' width='500' align='center'>
<tr><td colspan='2' align='center'>Ping Test</td>  </tr>
<tr><td width='100' align='center'>Target</td>
    <td width='400'><input type='text' name='url' size='30' style='width:400'></td>
                      <!-- ping�� ������ ip �ּ� �Է»��ڴ� ��$url���ڵ� �Ҵ� -->
</tr>
<tr><td colspan='2' align='center'>
    <input type='submit' name='smt' value='Test'>
    <input type='reset' name='rst' value='Cancel'></td>
      <!-- �Էµ� ������ ������ �����ϴ� [Test], [Cancel] ���� ���� -->

</tr>
</table>
</form>
<table border='1' width='500' align='center'>
<tr>
	<td>
	<?
	 echo $rst."<p>";                                    //shell���� ping ����� ������ ��� ���
	if($rst) {
  	  if(strpos($rst,"Received = 0")){
   	    echo "[$url] : ������ �ٿ�Ǿ����ϴ�.";
            //ping ��� �����κ��� �ƹ��� ������ ���� ���� �� �޽��� ���

          }else if(strpos($rst,"could not find")){
 	    echo "[$url] : �������� �ٽ� üũ�� �ּ���.";
           //������ ã�� �� ������ �޽��� ���
   	   }else{ 
 	   echo "[$url] : ������ � �� �Դϴ�.";     //���������� ��Ǿ��� �� �޽��� ���
          }
	    } else {
	     echo "&nbsp;";
	   }
	?>
	</td>
</tr>
</table>

</body>
</html>
