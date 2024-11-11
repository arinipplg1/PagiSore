<?php
require_once "../config/config.php";

if (isset($_POST['submit'])) {
    $Menu = $_POST['Menu'];
    $Deskripsi = $_POST['Deskripsi'];
    $Harga = $_POST['Harga'];
    $Kategori = $_POST['Id_Kategori'];
    $Image = basename($_FILES['gambarBarang']['name']);

?>
<?php

    $Data = [
        'Menu' => $Menu,
        'Deskripsi' => $Deskripsi,
        'Harga' => $Harga,
        'Kategori' => $Kategori,
        'Image' => $Image,
    ];

    $validasi = ValidasiData($Data);

    if ($validasi == 0) {
        echo "data sudah lengkap siap di inputkan";
        $result = InputProduct($Data, $Koneksi);
        $folderTujuan = $rootDir . "uploads";
        if ($result) {
            $upload = tambahGambar($folderTujuan, $_FILES['gambarBarang']);
            if ($upload)
                header("location:form.php?status=1");
            else
                header("location:form.php?errno=1");
        } else header("location:form.php?errno=1");
    } else {
        echo "data $validasi kurang";
    }
}
?>