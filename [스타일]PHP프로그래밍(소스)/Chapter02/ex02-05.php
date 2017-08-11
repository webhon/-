<html>
	<head><title>평가문제 2-5</title></head>
	<body>
<?
	class BOOK {
		var $name, $author, $publisher; 

		function set_value($name, $author, $publisher) {
			$this->name = $name;
			$this->author = $author;
			$this->publisher = $publisher;
		}

		function print_value() {
			echo "Name :: $this->name <br>";
			echo "Author :: $this->author <br>";
			echo "Publisher :: $this->publisher <br>";
		}
	}

	$aBook = new BOOK();
	$aBook->set_value("PHP프로그래밍", "박찬정", "웰북");
	$aBook->print_value();
?>
	</body>
</html>