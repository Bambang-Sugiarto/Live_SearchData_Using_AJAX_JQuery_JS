<?php
include "connect.php";
$kode_mk = $_REQUEST['kode_mk'];
if ($kode_mk !== "") {
    $query = mysqli_query($conn, "SELECT * FROM matakuliah WHERE kode_mk='$kode_mk' ");
    $row = mysqli_fetch_array($query);
    $nama_mk = $row['nama_mk'];
    $sks = $row['sks'];
    $nama_dosen = $row['nama_dosen'];
}

$result = array("$nama_mk", "$sks", "$nama_dosen");
$myJSON = json_encode($result);
echo $myJSON;
