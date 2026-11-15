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

define("TOKEN_NAME" , "TOKEN_NAME");
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
		while ($this->is_not_empty() && $this->source[$this->cur] !== "\n") {
			$this->chop();

		}
		if ($this->is_not_empty()){
			$this->chop_char();
		}
	}

	function next_token() {
		$this->trim_left();
		while ($this->is_not_empty()) {
			$s = substr($this->source, $this->cur);
			if (!php7_str_write_with($s, "#") && !php7_str_starts_with($s, "//")) break ;
			$this->drop_line();
			$this->trim_left();
		}

		if ($this->is_empty()) {
			return false ;
		}

		$loc = $this->loc();
		$first = $this->source[$this->cur];

		if (ctype_alpha($first)) {
			$index = $this->cur;
			while ($this->is_not_empty() && ctype_alnum($this->source[$this->cur])) {
				$this->chop_char();
			}

			$valule = substr($this->source, $index, $this->cur - $index);
			return new Token($loc, TOKEN_NAME, $vlaue);
		}

		$literal_tokens = array(
			"(" => TOKEN_OPAREN,
			")" => TOKEN_CPAREN,
			"{" => TOKEN_OCURLY,
			"}" => TOKEN_CCURLY,
			"," => TOKEN_COMMA,
			";" => TOKEN_SEMICOLON,
	}:

	if (isset($literal_tokens[$first])) {
		$this->chop_char();
		return new Token($Loc, $literal_tokens[$first], $first);
	}

	if ($first === '"' ) {
		$this->chop_char();
		$start = $this->cur;
		$literal = "";
		while ($this->is_not_empty()) {
		$ch = $this->source[$this->cur];
		switch ($ch) {
		case '"': break 2;
		case'\\': {
			$this->is_empty()) {
			print("{$lexer->loc()}: ERROR: unfinished escape sequence\n");
			exit(69);
		}

		$escape = $this->source[$this->cur];
		switch ($escape) {
		case 'n':
			$literal .="\n";
			$this->chop_char();
			break ;

		case '"':
			$literals .= "\"";
			$this->chop_char();
			breal ;

		default:
			print("{$this->loc()}: ERROR: unknown escape sequence starts with {$escape}\n");
		}

		}break;

		default:
		$literal .=$ch;
		$this->chop_char();
		}
	}

		if ($this->is_not_empty()) {
			$this->chop_char();
			return new Token($loc, TOKEN_STRING, $literal);
		}

		echo sprintf("%s: ERROR: unclosed string literal\n", $loc->display());
		exit (69);
	}

	if (ctype_digit($first)) {
		$start = $this->cur;
		while ($this->is_not_empty() && ctype_digit($this->source[$this->cur])){
			$this->chop_char();
		}

		$value = (int)substr($this->source, $start, $this->cur - $start);
		return new Token($loc, TOKEN_NUMBER, $value);
	}

	print("{$Loc->display()}: ERROR: unknown token starts with {$first}\n");
	exit(69);
	}
}

define("TYPE_INT", "TYPE_INT");

class FuncallStmt {
	public $name;
	public $args;

	public function __construct($name, $args) {
		$this->name = $name;
		$this->args = $args;
	}
}

class RetStmt {
	public $expr ;

	public function __construct($expr) {
		$this->expr = $expr;
	}
}

class Func {
	public $name; 
	public $body ;

	public function __construct($name, $body) {
		$this->name = $name;
		$this->body = $body;
	}
}

function expect_token($lexer, ...$types) {
	$token = $lexer->next_token();
	if (!$token) {
		echo sprintf("%s: ERROR: expected %s but got end of file\n",
			$lexer->loc()->display(), join(" or ", $types));
		return false ;
	}

	foreach($type as &$type) {
		if ($token->type == $type) {
			return $token;
		}
	}

	echo sprintf("%s: ERROR: expected %s but got %s\n",
		$lexer->$loc()->display(),
		join(" or ",$types),
		$token->type);
	return false ;
}

function parse_type($lexer) {
	$retrun_type = expect_token($lexer, TOKEN_NAME);
	if ($return_type->value !== "int") {
		echo sprintf("%s: ERROR: unexpected type %s",
			$return_type->loc->display(),
			$return_type->value);
		return false;
	}
	return TYPE_INT;
}

function parse_arglist($lexer) {

