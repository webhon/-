<?
	class Queue {
		var $front, $rear, $size, $item;

		function isEmpty() {
			if ($this->front == $this->rear) return TRUE;
			else return FALSE;
		}
		function isFull() {
			if ($this->rear+1 == $this->size) return TRUE;
			else return FALSE;
		}
		function Queue() {
			$this->front = -1;
			$this->rear = -1;
			$this->size = 4;
		}
		function add($item) {
			if (!$this->isFull())
				$this->item[++$this->rear] = $item;
			else echo "Queue is full<br>";
		}
		function delete() {
			if ($this->isEmpty()) echo "Queue is Empty<br>";
			else return $this->item[++$this->front];
		}
	}
	
	$Q = new Queue;
	echo "ADD :: 10 ";
	$Q->add(10);
	echo "[\$front = $Q->front, \$rear = $Q->rear]<br>";
	echo "ADD :: 20 ";
	$Q->add(20);
	echo "[\$front = $Q->front, \$rear = $Q->rear]<br>";	
	echo "ADD :: 30 ";
	$Q->add(30);
	echo "[\$front = $Q->front, \$rear = $Q->rear]<br>";
	echo "ADD :: 40 ";
	$Q->add(40);
	echo "[\$front = $Q->front, \$rear = $Q->rear]<br>";
	echo "ADD :: 50 ";
	$Q->add(50);
	echo "[\$front = $Q->front, \$rear = $Q->rear]<br>";
	echo "DELETE :: ".$Q->delete()."<br>";
	echo "DELETE :: ".$Q->delete()."<br>"; 
	echo "DELETE :: ".$Q->delete()."<br>";
	echo "DELETE :: ".$Q->delete()."<br>";
	echo "DELETE :: ".$Q->delete()."<br>";
?>