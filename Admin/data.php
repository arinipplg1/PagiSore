<?php
require_once "../config/config.php";

if (isset($_POST['submit'])) {
    $Menu = $_POST['Menu'];
    $Deskripsi = $_POST['Deskripsi'];
    $Harga = $_POST['Harga'];
    $Kategori = $_POST['Id_Kategori'];
    $Image = basename($_FILES['gambarBarang']['name']);
    $Id_Menu = $_POST['Id_Menu'];
    $Data = [
        'Id_Menu' => $Id_Menu,
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

else if(isset($_GET['del'])){
    $id = $_GET['del'] ?? null;

    if($id === null || !ctype_digit($id)){
        header("location:view.resto.php?errno=3");
    }
    else {
        // function delete
        $result = delMenu($koneksi, $id);
        if($result) 
            header("location:view.resto.php?success=1");
        else 
            header("location:view.resto.php?errno=5");
    }
}
?>