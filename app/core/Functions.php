<?php

function getComponent($file, $data = array()) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/components/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;

}

function getShared($file, $data = array()) {

	$docroot = $_SERVER['DOCUMENT_ROOT'];
	$dirpath = $docroot."/app/views/shared/";

	$filepath = $dirpath.$file.".php";

	return require_once $filepath;
}

function getHeader($options = array()) {

	return getShared("header");
}

function getFooter($options = array()) { 

	return getShared("footer");
}
