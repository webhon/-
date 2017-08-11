<?
	class Order (
		var $orderno, $orderdate, $oname, $shipaddr;
		var $billaddr, $ostate, $price;

		function setPrice($price) {
			$this->price = $price;		 
		}

		function setState($state) {
			$this->ostate = $state;
		}

		function printAll() {
			echo "林巩锅龋 : $this->orderno <br>";
			echo "林巩老 : $this->orderdate <br>";
			echo "林巩磊 : $this->oname <br>";
			echo "硅崔林家 : $this->shipaddr <br>";
			echo "没备林家 : $this->billaddr <br>";
			echo "林巩惑怕 : $this->ostate <br>";
			echo "林巩咀 : $this->price <br>";
		}
	};
?>