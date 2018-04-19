<?php
require_once ('vendor/autoload.php');
require 'db_connection.php';
use \Statickidz\GoogleTranslate;

if (isset($_POST['textareaTranslator']) && $_POST['textareaTranslator'] != NULL) {
	$source = 'en';
	$target = 'bn';
	$text = strtolower($_POST['textareaTranslator']);

	$ifWordAlreadyExist = ifWordAlreadyExist($text);

	$trans = new GoogleTranslate();
	$result = $trans->translate($source, $target, $text);

	if ($ifWordAlreadyExist == 1) {
		$translate_query = "INSERT INTO `word_list`(`id`, `english_word`, `bangla_word`) VALUES (NULL, '$text', '$result')";
		$translate_result = mysqli_query($connect, $translate_query);
		if ($translate_result) {
			echo $result;
		} else {
			echo "Error.";
			echo mysqli_error($connect);
		}
	} else {
		echo $result;
	}
} else {
	echo "Please Write Something";
}

function ifWordAlreadyExist($word)
{
	$WAE_query = "SELECT `english_word` FROM `word_list` WHERE `english_word` = '$word'";
	$WAE_result = mysqli_query($GLOBALS['connect'], $WAE_query);
	$WAE_row = mysqli_fetch_assoc($WAE_result);
	if ($WAE_row) {
		return 0;
	} else {
		return 1;
	}
}

?>