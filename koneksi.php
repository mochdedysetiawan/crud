<?php
$conn = mysqli_connect("localhost", "root", "", "bavana");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }

    return $datas;
}

function tambah($data)
{
    global $conn;

    //htmlspecialchars agar tidak bisa diinput sembarangan dan kena tangan orang nakal yang hack

    $judul = htmlspecialchars($data["judul"]);
    $konten = htmlspecialchars($data["konten"]);



    //upload gambar

    $gambar = upload();
    if (!$gambar) {

        return false;
    }


    //query insert data
    $query = "INSERT INTO blog

                    VALUES 
                    ('', '$judul', '$konten','$gambar')

                    ";
    mysqli_query($conn, $query);

    //mengembalikan nomor jika berhasil bernilai 1 jika gagal bernilai 0
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // melakukan pengecekan

    // cek apakah ada gambar yang diupload

    if ($error === 4) {

        echo "<script>
            
            alert('pilih gambar terlebih dahulu');
            
            </script>";

        // berhentikan function tambah ketika gagal upload 
        return false;
    }

    // cek apakah yang diupload gambar atau bukan atau harus gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // memecah nama file .jpg atau lainnya
    $ekstensiGambar = explode('.', $namaFile);
    // mengambil ekstensi dari gambar end untuk mengambil ekstensi dari gambar strlower untuk mengubah jika hurufnya besar kecil
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // sebuah fungsi untuk menampilkan true jika ekstensi $gambar ada pada $gambarValid dan false jika ekstensi $gambar tidak ada pada $gambarValid
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

        echo
        "<script>
            alert('yang anda upload bukan gambar !');
            </script>";
        return false;
    };

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {

        echo
        "<script>
            alert('ukuran gambar terlalu besar !');
            </script>";
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);


    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM blog WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function edit($data)
{
    global $conn;

    //htmlspecialchars agar tidak bisa diinput sembarangan dan kena tangan orang nakal yang hack
    $id = htmlspecialchars($data["id"]);
    $judul = htmlspecialchars($data["judul"]);
    $konten = htmlspecialchars($data["konten"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak 
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }





    //query update data
    $query = "UPDATE blog SET

              judul  = '$judul',
              konten = '$konten',
              gambar = '$gambar'  
    
              WHERE id = $id
    ";
    mysqli_query($conn, $query);

    //mengembalikan nomor jika berhasil bernilai 1 jika gagal bernilai 0
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{

    $query = "SELECT * FROM blog
                WHERE 
                judul LIKE '%$keyword%' OR
                konten LIKE '%$keyword%'
    ";
    return query($query);
}
