<?php

function select($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function create_buku($post)
{
    global $db;

    $judul = $post['judul'];
    $penulis = $post['penulis'];
    $penerbit = $post['penerbit'];
    $jenis_buku = $post['jenis_buku'];
    $sampul = upload_file();

    if (!$sampul) {
        return false;
    }

    $query = "INSERT INTO buku VALUES(null, '$judul', '$penulis', '$penerbit', '$jenis_buku', '$sampul')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_buku($post)
{
    global $db;
    $id_buku = $post['id_buku'];
    $judul = $post['judul'];
    $penulis = $post['penulis'];
    $penerbit = $post['penerbit'];
    $jenis_buku = $post['jenis_buku'];
    $sampullama = $post['sampullama'];

    if ($_FILES['sampul']['error'] === 4) {
        $sampul = $sampullama;
    } else {
        $sampul = upload_file();
    }

    $query = "UPDATE buku SET 
        judul = '$judul', 
        penulis = '$penulis', 
        penerbit = '$penerbit', 
        jenis_buku = '$jenis_buku', 
        sampul = '$sampul' 
        WHERE id_buku = '$id_buku'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function delete_buku($id_buku)
{
    global $db;

    $buku = select("SELECT * FROM buku WHERE id_buku = $id_buku")[0];
    unlink(__DIR__ . "/../img/" . $buku['sampul']);

    $query = "DELETE FROM buku WHERE id_buku = $id_buku";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function create_akun($post)
{
    global $db;

    $nama = $post['nama'];
    $username = $post['username'];
    $password = password_hash($post['password'], PASSWORD_BCRYPT);
    $role = $post['role'];

    $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$password', '$role')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function login($post)
{
    global $db;
    $username = $post['username'];
    $password = $post['password'];

    $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $hasil = mysqli_fetch_assoc($result);
        $hashedPassword = $hasil['password'];

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['role'] = $hasil['role'];
            $_SESSION['id_akun'] = $hasil['id_akun'];

            if ($hasil['role'] == 'admin') {
                header("Location: index_admin.php");
            } elseif ($hasil['role'] == 'member') {
                header("Location: index_anggota.php");
            }
            exit();
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}


function upload_file()
{
    $namaFile = $_FILES['sampul']['name'];
    $ukuranFile = $_FILES['sampul']['size'];
    $error = $_FILES['sampul']['error'];
    $tmpName = $_FILES['sampul']['tmp_name'];

    $extensiFileValid = ['jpg', 'jpeg', 'png'];
    $extensiFile = explode('.', $namaFile);
    $extensiFile = strtolower(end($extensiFile));

    if (!in_array($extensiFile, $extensiFileValid)) {
        echo "<script>
                alert('Format file tidak valid!');
              </script>";
        return false;
    }

    if ($ukuranFile > 1048576) {
        echo "<script>
                alert('Ukuran file terlalu besar! Maksimal 1MB.');
              </script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $extensiFile;
    move_uploaded_file($tmpName, __DIR__ . '/../img/' . $namaFileBaru);

    return $namaFileBaru;
}

// function pinjamBuku($dataBuku) {
//     global $db;

//     $tglPinjam = mysqli_real_escape_string($db, $dataBuku["tgl_pinjam"]);
//     $tglKembali = mysqli_real_escape_string($db, $dataBuku["tgl_kembali"]);

//     $queryPinjam = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali) 
//                     VALUES ('$tglPinjam', '$tglKembali')";

//     if (mysqli_query($db, $queryPinjam)) {
//         return mysqli_affected_rows($db);
//     } else {
//         echo "Error executing query: " . mysqli_error($db);
//         return false;
//     }
// }

?>
