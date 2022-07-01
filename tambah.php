<?php

include 'koneksi.php';

//cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {

    //cek apakah berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan !');
            document.location.href = 'operasi.php';
        
        </script>

        ";
    } else {
        echo "
        <script>
            alert('data berhasil ditambahkan !');
            
        
        </script>
        
        ";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">



</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    ini halaman tambah
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">

                <form method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="id" id="id">

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">konten</label>
                        <textarea class="form-control" placeholder="tulis konten disini...." id="konten" style="height: 800px" name="konten"></textarea>

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">

                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>