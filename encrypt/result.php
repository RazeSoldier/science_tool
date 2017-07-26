<?php
header('content-type:text/html;charset=utf-8');

if($_POST["sha1"] != NULL){
	require_once "./resources/sha1.php"; //SHA-1计算
}else if($_POST["md5"] != NULL){
	require_once "./resources/md5.php"; //MD5计算
}else if($_POST["sha256"] != NULL){
	require_once "./resources/sha256.php"; //SHA-256计算
}else if($_POST["sha224"] != NULL){
	require_once "./resources/sha224.php"; //SHA-224计算
}else if($_POST["sha384"] != NULL){
	require_once "./resources/sha384.php"; //SHA-384计算
}else if($_POST["sha512"] != NULL){
	require_once "./resources/sha512.php"; //SHA-512计算
}else if($_POST["md2"] != NULL){
	require_once "./resources/md2.php"; //MD2计算
}else if($_POST["md4"] != NULL){
	require_once "./resources/md4.php"; //MD4计算
}else{
	require_once "../includes/return.php";
}