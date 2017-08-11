<?
   class Cart {
	  var $items , $Noitems, $TotalCost;

	  function Cart() {
		  $this->Noitems = 0;
		  $this->TotalCost = 0;
	  }

	  function add_item($no, $item) {
		  $this->Noitems++;
		  $this->items[$no] += $item ;
		  $this->TotalCost += $item ;
	  }

	  function delete_item($no) {
		  $item = $this->items[$no] ;
		  $this->items[$no] = NULL;
		  $this->TotalCost -= $item ;
		  $this->Noitems--;
	  }

	  function print_item() {
		  echo "<hr><br>";
		  echo "TotalCoast : $this->TotalCost <br>";
		  echo "NoItems : $this->Noitems <br>";
		  echo "Items::<br>";
		  print_r($this->items);	
	   }
   };

  $c = new Cart;
  $c->add_item(0, 10);
  $c->print_item();
  $c->add_item(1, 25);
  $c->print_item();
  $c->delete_item(0);
  $c->print_item();

?>