<?
	class Book {
		var $author, $title, $publisher, $price, $pdate, $area;

		function SetAuthor($value) {
			$this->author = $value; 
		}
		function SetTitle($value) {
			$this->title = $value;
		}
		function SetPublisher($value) {
			$this->publisher = $value;
		}
		function SetPrice($value) {
			$this->price = $value;
		}
		function SetPdate($value) {
			$this->pdate = $value;
		}
		function SetArea($value) {
			$this->area = $value;
		}

		function GetAuthor($msg) {
			echo $msg.$this->author."<br>"; 
		}
		function GetTitle($msg) {
			echo $msg.$this->title."<br>";
		}
		function GetPublisher($msg) {
			echo $msg.$this->publisher."<br>";
		}
		function GetPrice($msg) {
			echo $msg.$this->price."<br>";
		}
		function GetPdate($msg) {
			echo $msg.$this->pdate."<br>";
		}
		function GetArea($msg) {
			echo $msg.$this->area."<br>";
		}
		function GetAll() {
			echo "저 자 : ".$this->author."<br>"; 
			echo "제 목 : ".$this->title."<br>";
			echo "출판사 :".$this->publisher."<br>";
			echo "가 격 : ".$this->price."<br>";
			echo "출판일 : ".$this->pdate."<br>";
			echo "영 역 : ".$this->area."<br>";
		}
		function SetAll($au, $t, $pu, $pr, $pd, $ar) {
			if (!isset($this->author)) $this->author = $au;
			if (!isset($this->title)) $this->title = $t;
			if (!isset($this->publisher)) $this->publisher = $pu;
			if (!isset($this->price)) $this->price = $pr;
			if (!isset($this->pdate)) $this->pdate = $pd;
			if (!isset($this->area)) $this->area = $ar;
		}
	};

	$book[0] = new Book;
	$book[1] = new Book;

	$book[0]->SetAll("릭마티슨", "모바일브랜딩", "가람", 12000, "2008-04-20", "경영");
	$book[1]->SetAuthor("하워드가드너");
	$book[1]->SetTitle("다중지능");
	$book[1]->SetPublisher("웅진지식하우스");
	$book[1]->SetPrice(14000);
	$book[1]->SetPdate("2007-09-03");
	$book[1]->SetAll("A", "B", "C", 0, "D", "인문");

	$book[0]->GetAuthor("저 자 : ");
	$book[0]->GetTitle("제 목 : ");
	echo "<hr>";
	$book[1]->GetAll();
?>