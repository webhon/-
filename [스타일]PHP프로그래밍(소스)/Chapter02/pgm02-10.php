<?
class CAR {
	var $model, $color, $company, $price;
	function CAR() {
		$this->color = "white";
		$this->company = "CarCompany";
	}
	function setPrice($n) {
		$this->price = $this->price + $n;
	}
	function printCar() {
		echo "Color : $this->color <br>"; 
		echo "Model : $this->model <br>";
		echo "Price : $this->price <br>";
	}
}
?>
