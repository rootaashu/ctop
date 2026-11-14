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

define("Token_Name" , "Token_Name");
define("TOKEN_OPAREN", "TOKEN_OPAREN");
define("TOKEN_CPAREN", "TOKEN_CPAREN");
define("TOKEN_OCURLY", "TOKEN_OCURLY");
define("TOKEN_CCURLY", "TOKEN_CCURLY");
define("TOKEN_COMMA", "TOKEN_COMMA");
define("TOKEN_SEMICOLON", "TOKEN_SEMICOLON");
define("TOKEN_NUMBER", "TOKEN_NUMBER");
define("TOKEN_STRING", "TOKEN_STRING");
define("TOKEN_RETURN", "TOKEN_RETURN");

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

	function trim_left () {
		while ($this->is_not_empty() && $ctype_space($this->source[$this->cur])) {
			$this->chop_char();
		}
	}

	function drop_line() {
		while ($this->is_not_empty() && $this->source
}
