<html>
	<head><title>종합문제 2-1</title></head>
	<body>
<?
	class Cart {
		var $items;

		function Cart() {
			$this->items[0] = 0;
			$this->items[1] = 0;
		}

		function add_item($no, $value) {
			$this->items[$no] += $value;
		}

		function delete_item($no, $value) {
			$this->items[$no] -= $value;
		}
	};

	$my_cart = new Cart;
	$my_cart->add_item(0, 10);
	$my_cart->add_item(1, 20);
	$my_cart->delete_item(1, 5);

	echo $my_cart->items[0]."<br>";
	echo $my_cart->items[1]."<br>"; 
?>
	</body>
</html>