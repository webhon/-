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
?>