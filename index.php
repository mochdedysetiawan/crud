<?php

include 'koneksi.php';

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
        <div class="row text-center">
            <div class="col">
                <h1>
                    Ini adalah halaman utama
                </h1>
            </div>
        </div>
    </div>

    <?php

    $query = mysqli_query($conn, "SELECT * FROM blog ORDER BY id DESC");
    while ($data = mysqli_fetch_array($query)) {

    ?>

        <div class="container">
            <div class="row mb-3">
                <div class="col ">
                    <div class="card">
                        <div>
                            <?php echo "<img src='img/$data[gambar]' />"; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['judul'] ?></h5>
                            <p class="card-text"><?php echo $data['konten'] ?></p>
                            <a href="#" class="btn btn-primary ">read more</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>