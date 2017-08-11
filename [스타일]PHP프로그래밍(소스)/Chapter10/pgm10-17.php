<? 
	session_start();

	echo "<html>\n" ;
	echo "<head>\n" ;
	echo "<title>도서 장바구니 보기</title>\n" ;
	echo "</head>\n" ;
	echo "<body>\n" ;
	echo "<h1>내 장바구니</h1>\n" ;

	if (isset($_SESSION["books"])) {
		echo "<b>대여할 도서 목록</b>\n";
		echo "<ul>\n";
			foreach (unserialize($_SESSION["books"]) as $book) 
			echo "<li> $book </li>" ;
			echo "</ul>";
	}
	else {
		echo "아직 대여한 도서가 없습니다." ;
	}

	echo "<p><a href=\"pgm10-16.php\">계속 도서 대여하기</a></p>\n" ;
	echo "</body>\n" ;
	echo "</html>\n" ;
?>