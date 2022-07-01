<?php

include 'koneksi.php';
$blog = query("SELECT * FROM blog ORDER BY id DESC");

//ketika tombol cari ditekan

if (isset($_POST["cari"])) {
    $blog = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>
                    halo admin
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-1">
                <a href="tambah.php" class="btn btn-primary ">Tambah</a>
            </div>
            <div class="col-md-11 d-flex justify-content-end ">


                <form class="row row-cols-lg-auto g-3 align-items-center" action="" method="POST">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" name="keyword" placeholder="Cari..." class="form-control" style="width : 500px;" autofocus autocomplete="off">
                        </div>
                    </div>



                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" name="cari">cari</button>

                    </div>
                </form>

            </div>








        </div>






    </div>


    </div>
    </div>

    <?php

    foreach ($blog as $data) :

        // var_dump($data);


    ?>

        <div class="container">
            <div class="row mb-3">
                <div class="col ">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['judul'] ?></h5>
                            <p class="card-text"><?php echo $data['konten'] ?></p>
                            <a href="edit.php?id=<?= $data["id"] ?>" class="btn btn-warning ">edit</a>
                            <!-- tombol hapus diisi dengan id -->
                            <a href="hapus.php?id=<?= $data["id"] ?>;" class="btn btn-danger">hapus</a>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php

    endforeach;
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>