<?php 
include 'koneksi.php';
$nim = $_GET['nim'];
$query = mysqli_query($konek,"DELETE FROM mahasiswa WHERE nim='".$_GET['nim']."';");

if ($query) {
    echo '<script type="text/javascript">
            alert("Data terhapus");
            window.location.href = "index.php";
        </script>';
} else {
    echo '<script type="text/javascript">
            alert("Data gagal terhapus");
            window.location.href = "index.php";
        </script>';
}

// header("location:index.php");
?>