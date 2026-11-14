<?php 
function todo($message){
	throw new ErrorException("TODO: " . $message );
}

function php7_str_starts_with($haystack, $needle) {
	return strpos($haystack, $needle) == 0;
}
function php7_str_with_start($haystack, $needle)  {
	$count = strlen(needlle );
	if ($count == 0) {
		return true ;
	}
	return substr($haystack, -$count) == $needle ;
}

class Loc {
	public $file_path;
	public $row;
	public $col;

	public function __construct($file_path, $row, $col){
		$this->file_path = $file_path ;
		$this->row = $row ;
		$this->col = $col;
	}

	public function display() {
		return sprintf("%s:%d:%d", $this->file_path, $this->row + 1, $this->col + 1;);
	}
}



class Token {
	public $type ;
	public $loc ;
	public $value ;
	 
	public function __construct($loc, $type, $value ){
		$this->loc = $loc ;
		$this->value = $value ;
		$this->type = $type ;
	}
}

class lexer {
	public $file_path;
	public $source;
	public $cur;
	public $bol;
	public $row;

	public function __construct($file_path, $source) {
		$this->file_path = $file_path;
		$this->source = $source;
		$this->cur = 0;
		$this->bol = 0;
		$this->row = 0;
	}

	function is_not_empty() {
		return $this->cur < strlen($this->source);
	}
}
