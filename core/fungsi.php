<?php

function getIndexOfChar($char) {
	$rangeChar = range('A', 'Z');
	$lengthChar = count($rangeChar);
	$index;
	for ($i = 0; $i < $lengthChar; $i++) {
		if($char == $rangeChar[$i]) {
			$index = $i;
			break;
		}
	}

	return $index;
}

function getCharFromIndex($index) {
	$rangeChar = range('A', 'Z');
	$lengthChar = count($rangeChar);

	if($index > ($lengthChar - 1)) {
		$index = $index - $lengthChar;
	} else if($index < 0) {
		$index = $index + $lengthChar;
	}

	//print_r($rangeChar);

	return $rangeChar[$index];
}