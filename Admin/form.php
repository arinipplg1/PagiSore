"</br>" <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Barang</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mt-4">PAGI SORE RESTO</h2>

        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Menu">Menu:</label>
                    <input type="text" class="form-control" id="NamaMenu" name="Menu" placeholder="Masukkan menu" required>
                </div>
            

                <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Harga">Harga:</label>
                    <input type="text" class="form-control" id="Harga" name="Harga" placeholder="Masukkan harga" required>
                </div>
                
                <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Deskripsi">Deskripsi:</label>
                    <input type="text" class="form-control" id="Deskripsi" name="Deskripsi" placeholder="MasukkanDeskripsi" required>
                </div>


                <!-- Input Kategori Barang -->
                <div class="form-group">
                    <label for="Id_Kategori">Id Kategori:</label>
                    <select class="form-control" id="Id_Kategori" name="Id_Kategori" required>
                        <option value="" disabled selected>Pilih Id kategori</option>
                        <option value="cleanser">MAKANAN</option>
                        <option value="toner">MINUMAN</option>
                        <option value="serum">LainnyaS</option>
                    </select>
                </div>

                <!-- Input Gambar Barang -->
                <div class="form-group">
                    <label for="gambarBarang">Upload Gambar Barang:</label>
                    <input type="file" class="form-control-file" id="gambarBarang" name="gambarBarang" accept="image/*" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" name="submit" class="btn btn-success btn-block">Kirim Data Barang</button>
            </form>
                </div>



        <?php
        if (isset($_POST['submit'])) {
           echo $NamaBarang = $_POST['namaBarang']; 
           echo $kategoriBarang = $_POST['kategoriBarang'];
           echo $kodekategoriBarang = $_POST['kodekategoriBarang'];
           echo $kodebarang = $_POST['kodebarang'];
           echo $hargabarang = $_POST['hargabarang'];
           echo $deskripsibarang = $_POST['deskripsiBarang'];
           
           $gambarBarang = $_FILES['gambarBarang']["name"];
           $tempname = $_FILES['gambarBarang']["tmp_name"];
           $folder="./img/".$gambarBarang;
           if (move_uploaded_file($tempname,$folder))
           echo'<img src="'.$folder.'"';
        }
        ?>


        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>