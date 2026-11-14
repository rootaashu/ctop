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

