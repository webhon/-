<html>
	<head><title>프로그램 2-3</title></head>
	<body>
<?
   $bool_var = TRUE;		// 변수 $bool_var은 진실값 1(TRUE)을 갖는다.
   $int_var = 30;		// 변수 $int_var은 정수 30을 갖는다.
   $str_var = "65 km";	        // 변수 $str_var은 문자열 "65 km"을 갖는다.

   settype($bool_var, string);   // 불리안형을 문자열형으로 설정한다.
   settype($int_var, float);  	// 정수형을 실수형으로 설정한다.
   settype($str_var, integer);   // 문자열형을 정수형으로 설정한다.

   echo "changed bool_var : $bool_var - ".gettype($bool_var)."<br>";  
   echo "changed int_var : $int_var - ".gettype($int_var)."<br>";
   echo "changed str_var : $str_var - ".gettype($str_var)."<br>";
?>
	</body>
</html>