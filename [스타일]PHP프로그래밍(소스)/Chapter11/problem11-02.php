<?
	class POINT {
		var $x, $y;
		function POINT($x, $y) {
			$this->x = $x;
			$this->y = $y;
		}
	}

	class POLYGON {
		var $area;

		function getArea($portion, $width, $height) {
			if ($portion == 1) echo "사각형의 ";
			else echo "삼각형의 ";
			echo "면적 : ". $portion * $width * $height."<br>";
		}
	}

	class RTRIANGLE extends POLYGON {
		var $p1, $p2, $p3;
		var $width, $height;
		/* p2에서 직각을 이루는 직각삼각형을 가정한다. */
		
		function RTRIANGLE($x1, $y1, $x2, $y2, $x3, $y3) {
			$this->p1 = new POINT($x1, $y1);
			$this->p2 = new POINT($x2, $y2);
			$this->p3 = new POINT($x3, $y3);
		}

		function getWidth() {
			$this->width = abs($this->p2->x - $this->p3->x);
		}

		function getHeight() {
			$this->height = abs($this->p1->y - $this->p2->y);
		}

	}

	class RECTANGLE extends POLYGON {
		var $p1, $p2;
		var $width, $height;
		/* 직각사각형을 가정한다. */

		function RECTANGLE($x1, $y1, $x2, $y2) {
			$this->p1 = new POINT($x1, $y1);
			$this->p2 = new POINT($x2, $y2);
		}

		function getWidth() {
			$this->width = abs($this->p1->x - $this->p2->x);
		}

		function getHeight() {
			$this->height = abs($this->p1->y - $this->p2->y);
		}
	}

	$t = new RTRIANGLE(10, 20, 10, 10, 20, 10);
	$t->getWidth();
	$t->getHeight();
	$t->getArea(0.5, $t->width, $t->height);

	$r = new RECTANGLE(10, 10, 20, 20);
	$r->getWidth();
	$r->getHeight();
	$r->getArea(1, $r->width, $r->height);
?>