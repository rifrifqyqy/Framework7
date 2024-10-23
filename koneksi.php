<?php
$koneksi = mysqli_connect("localhost","root","","latihan");

// Check connection
if ($koneksi -> connect_errno){
    echo "koneksi gagal!".mysqli_connect_errno();
}