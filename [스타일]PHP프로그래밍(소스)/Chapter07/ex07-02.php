<html>
	<head><title>평가문제 7-2</title></head>
	<body>
<?
     $money = "The fee is $1900.50";
     if (ereg("[1-9][0-9]*\.[0-9]{2,2}", $money, $m)) {
        echo $m[0] . ":: correct! <BR>";
     }
	 else echo "Incorrect! <BR>";

     $money = "The fee is $2000.5";
     if (ereg("[1-9][0-9]*\.[0-9]{2,2}", $money, $m)) {
        echo $m[0] . ":: correct! <BR>";
     }
	 else echo $money . ":: Incorrect! <BR>";
?>
	</body>
</html>