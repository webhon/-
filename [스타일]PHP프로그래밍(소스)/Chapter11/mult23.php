<?
	class Stack {
		var $top, $size, $item;

		function isEmpty() {
			if ($this->top == -1) return TRUE;
			else return FALSE;
		}

		function isFull() {
			if ($this->top >= $this->size) return TRUE;
			else return FALSE;
		}

		function Stack() {
			$this->top = -1;
			$this->size = 10;
		}
		function push($item) {
			if (!$this->isFull())
				$this->item[++$this->top] = $item;
			else echo "Stack is full<br>";
		}
		function pop() {
			if ($this->isEmpty()) echo "Stack is Empty<br>";
			else return $this->item[$this->top--];
		}
	}
	
	$S = new Stack;
	echo "PUSH :: 10<br>"; $S->push(10);
	echo "PUSH :: 20<br>"; $S->push(20);
	echo "PUSH :: 30<br>"; $S->push(30);
	echo "POP :: "; echo $S->pop()."<br>";
	echo "POP :: "; echo $S->pop()."<br>";
	echo "POP :: "; echo $S->pop()."<br>";
	echo "POP :: "; echo $S->pop()."<br>";
?>