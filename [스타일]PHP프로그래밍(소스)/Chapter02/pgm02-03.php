<html>
	<head><title>���α׷� 2-3</title></head>
	<body>
<?
   $bool_var = TRUE;		// ���� $bool_var�� ���ǰ� 1(TRUE)�� ���´�.
   $int_var = 30;		// ���� $int_var�� ���� 30�� ���´�.
   $str_var = "65 km";	        // ���� $str_var�� ���ڿ� "65 km"�� ���´�.

   settype($bool_var, string);   // �Ҹ������� ���ڿ������� �����Ѵ�.
   settype($int_var, float);  	// �������� �Ǽ������� �����Ѵ�.
   settype($str_var, integer);   // ���ڿ����� ���������� �����Ѵ�.

   echo "changed bool_var : $bool_var - ".gettype($bool_var)."<br>";  
   echo "changed int_var : $int_var - ".gettype($int_var)."<br>";
   echo "changed str_var : $str_var - ".gettype($str_var)."<br>";
?>
	</body>
</html>