<?php
error_reporting(0);
require_once ('vendor/autoload.php');
require 'db_connection.php';
use \Statickidz\GoogleTranslate;

set_error_handler("noInternetError",E_ALL);
function noInternetError($errno, $errstr)
{
	echo "No Internet Connection.";
	die();
}

if (isset($_POST['textareaTranslator']) && $_POST['textareaTranslator'] != NULL && $_POST['textareaTranslator'] != '') {
	$source = 'en';
	$target = 'bn';
	$text = strtolower($_POST['textareaTranslator']);

	$ifWordAlreadyExist = ifWordAlreadyExist($text);

	$trans = new GoogleTranslate();
	$result = $trans->translate($source, $target, $text);
	$printResult = strtolower($result);
	$textlen = strlen($text) - 1;
	$resultlen = strlen($printResult);
	
/*
	echo "text : " . $textlen . " : ";
	echo "result : " . $resultlen . " : ";

	echo "text : " . strtolower($text) . " : ";
	echo "result : " . strtolower($printResult) . " : ";
*/

	if ($ifWordAlreadyExist == 1) {
		if ($textlen == $resultlen) {
			echo $printResult;
		} else {
			$translate_query = "INSERT INTO `word_list`(`id`, `english_word`, `bangla_word`) VALUES (NULL, '$text', '$printResult')";
			$translate_printResult = mysqli_query($connect, $translate_query);
			if ($translate_printResult) {
				echo $printResult;
			} else {
				echo "Error.";
			}
		}
	} else {
		echo $printResult;
	}
} else {
	echo "Please Write Something";
}

function ifWordAlreadyExist($word)
{
	$WAE_query = "SELECT `english_word` FROM `word_list` WHERE `english_word` = '$word'";
	$WAE_printResult = mysqli_query($GLOBALS['connect'], $WAE_query);
	$WAE_row = mysqli_fetch_assoc($WAE_printResult);
	if ($WAE_row) {
		return 0;
	} else {
		return 1;
	}
}

?>