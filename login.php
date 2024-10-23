<?php
include("koneksi.php");
header ("Access-Control-Allow-Origin: ");
header ("Access-Control-Allow-Credentials: true ");
header ("Access-Control-Allow-Methods: POPST, GET, DELETE, OPTIONS ");
header ("Access-Control-Allow-Max-Age: 604800");
header ("Access-Control-Request-Headers: x-requested-with");
header ("Access-Control-Allow-Headers-: x-requested-with, x-requested-by");

$username = isset($_POST['username']) ? mysqli_real_escape_string($koneksi, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($koneksi, $_POST['password']) : '';


$query = mysqli_query($koneksi, "select * from users where username='$username' and password='$password'") or die (mysqli_error());
$result_num = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
$output = array();
if ($result_num == 1){
    $output['msg'] = "success";
    $output['id'] = $data['id'];
    $output['username'] = $data['username'];

}else {
    $output ['error'] = true;
    $output['msg'] = "failed to login";
}
echo json_encode($output);

