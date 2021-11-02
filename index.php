<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Coba</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center" style="margin-top: 50px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <h2>Form Transaksi</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <label for="" class="form-label">Kode Matakuliah</label>
                            <input class="form-control" type="text" id="kode_mk" onkeyup="GetDetail(this.value)">
                            <label for="" class="form-label mt-2">Nama Matakuliah</label>
                            <input class="form-control" type="text" id="nama_mk">
                            <label for="" class="form-label mt-2">SKS</label>
                            <input class="form-control " type="text" id="sks">
                            <label for="" class="form-label mt-2">Nama Dosen Pengampu</label>
                            <input class="form-control " type="text" id="nama_dosen">

                            <a href="" type="submit" class="btn btn-success mt-2">Update Data</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("kode_mk").value = "";
                document.getElementById("nama_mk").value = "";
                document.getElementById("sks").value = "";
                document.getElementById("nama_dosen").value = "";
                return;
            } else {
                /*XMLHttpRequest object Javascript untuk 
                membuat request ke server tanpa melakukan refresh halaman website*/
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    /* status digunakan untuk response code yang dihasilkan dari direquest yang dilakukan.
                    jika file yang direquest ke server tidak ditemukan maka status akan berisi 404.*/
                    /* readystate berisi informasi state dari object XMLHttpReques 
                    0: uninitialized, 1: loading, 2: loaded, 3: interactive, 4: complete*/
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        document.getElementById("nama_mk").value = myObj[0];
                        document.getElementById("sks").value = myObj[1];
                        document.getElementById("nama_dosen").value = myObj[2];
                    }
                };
                //open untuk membuka koneksi dengan document yang ada di server
                xmlhttp.open("GET", "search.php?kode_mk=" + str, true);
                /// send untuk mengirim request ke server
                xmlhttp.send();
            }
        }
    </script>
</body>

</html>