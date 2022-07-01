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



        <?php

        $query = mysqli_query($conn, "SELECT * FROM blog where id = 1");
        while ($data = mysqli_fetch_array($query)) {
        ?>

            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <?php echo "<img src='img/$data[gambar]' />"; ?>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>
                            <?= $data['judul'] ?>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <p><?= $data['konten'] ?></p>
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