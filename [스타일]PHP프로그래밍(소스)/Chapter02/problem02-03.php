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
			echo "�ֹ���ȣ : $this->orderno <br>";
			echo "�ֹ��� : $this->orderdate <br>";
			echo "�ֹ��� : $this->oname <br>";
			echo "����ּ� : $this->shipaddr <br>";
			echo "û���ּ� : $this->billaddr <br>";
			echo "�ֹ����� : $this->ostate <br>";
			echo "�ֹ��� : $this->price <br>";
		}
	};
?>