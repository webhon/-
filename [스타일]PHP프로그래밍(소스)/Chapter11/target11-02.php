<?
	class Point {
		var $x, $y ;
		function getPosition() {
			echo "X : $this->x, Y : $this->y <BR>" ;
		}
		function setPosition($x, $y) {
			$this->x = $x ;
			$this->y = $y ;
		}
	} ;
	class Line {
		var $p1, $p2 ;
		
		function Line($x1, $y1, $x2, $y2) {
			$this->p1 = new Point ;
			$this->p1->setPosition($x1, $y1) ;
			$this->p2 = new Point ;
			$this->p2->setPosition($x2, $y2) ;
		}
		function getLength() {
			$length = sqrt(($this->p1->x - $this->p2->x) * ($this->p1->x - $this->p2->x) +
				           ($this->p1->y - $this->p2->y) * ($this->p1->y - $this->p2->y));
			return $length ;
		}
	} ;
	class Rectangle {
		var $p1, $p2 ;

		function Rectangle($x1, $y1, $x2, $y2) {
			$this->p1 = new Point ;
			$this->p1->setPosition($x1, $y1) ;
			$this->p2 = new Point ;
			$this->p2->setPosition($x2, $y2) ;
		}

		function getArea() {
			return abs(($this->p1->x - $this->p2->x) * ($this->p1->y - $this->p2->y)) ;
		}
	} ;

    $p = new Point ;
	$p->setPosition(1, 3) ;
	$p->getPosition() ;

	$l = new Line(10, 10, 20, 20) ;
	printf("length = %5.2f <BR>" , $l->getLength()) ;

	$r = new Rectangle(10, 10, 20, 20) ;
	printf("Area = %5.2f <BR>", $r->getArea()) ;
?>