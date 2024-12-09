
<?php

function ValidasiData($Data)
{
    foreach ($Data as $Product => $Value) {
        $Value = trim($Value);
        if ($Value === '' || $Value === 0 || $Value === null || $Value == False) {
            return $Product;
        }
    }
    return 0;
}

function InputProduct($Data, $Koneksi)
{
    $Menu = $Data['Menu'];
    $Deskripsi = $Data['Deskripsi'];
    $Harga = $Data['Harga'];
    $Kategori = $Data['Kategori'];
    $Image = $Data['Image'];
    
    $sql = "INSERT INTO tb_menu (Nama_Menu, Deskripsi, Harga, Id_Kategori, Gambar) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($Koneksi, $sql);
    if ($stmt == false) {
        return "FAILED";
    }

    mysqli_stmt_bind_param($stmt, 'ssiis', $Menu, $Deskripsi, $Harga, $Kategori,$Image );
    $result = mysqli_stmt_execute($stmt);

    if (!$result)
        return false;

    mysqli_stmt_close($stmt);
    return true;
}

function ViewProduct($koneksi){
    $sql = "SELECT tb_menu.Nama_Menu, tb_menu.Deskripsi, tb_menu.Harga, tb_menu.Gambar, tb_kategori.Nama_Katalog ,tb_menu.Id_Menu
FROM tb_menu 
LEFT JOIN tb_kategori ON tb_kategori.Id_Kategori = tb_menu.Id_Kategori
WHERE 1;
";

    $stmt = mysqli_query($koneksi, $sql);

    if(mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false; 
}

function delMenu($koneksi, $id){
    $sql = "DELETE FROM tb_menu WHERE Id_Menu = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if($result) return true;
    else return false; 
}

?>
