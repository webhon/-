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
			echo "�� �� : ".$this->author."<br>"; 
			echo "�� �� : ".$this->title."<br>";
			echo "���ǻ� :".$this->publisher."<br>";
			echo "�� �� : ".$this->price."<br>";
			echo "������ : ".$this->pdate."<br>";
			echo "�� �� : ".$this->area."<br>";
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

	$book[0]->SetAll("����Ƽ��", "����Ϻ귣��", "����", 12000, "2008-04-20", "�濵");
	$book[1]->SetAuthor("�Ͽ��尡���");
	$book[1]->SetTitle("��������");
	$book[1]->SetPublisher("���������Ͽ콺");
	$book[1]->SetPrice(14000);
	$book[1]->SetPdate("2007-09-03");
	$book[1]->SetAll("A", "B", "C", 0, "D", "�ι�");

	$book[0]->GetAuthor("�� �� : ");
	$book[0]->GetTitle("�� �� : ");
	echo "<hr>";
	$book[1]->GetAll();
?>