<?php
$dir = "./imsi/";

if(is_dir($dir))					
{
	if($dir_handle=opendir($dir))		
	{
		while(($file_handle=readdir($dir_handle)) != false)  
		{
			echo "���ϸ� : ".$file_handle."<br>";
		}
	}
}
else
{
	echo "���丮�� �ƴմϴ�.";
}

closedir($dir_handle);			
?>
