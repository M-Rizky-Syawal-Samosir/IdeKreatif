<?php
session_start();

$name = $_SESSION['nama'];
$name = $_SESSION["role"];
//Ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification) {

}unset($_SESSION['notification']);
