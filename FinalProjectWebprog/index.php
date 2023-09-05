<?php
    session_start();
    function add_menu() {
        $makanan = array(
            "kode" => $_POST["txtkode"],
            "nama" => $_POST["txtnama"],
            "harga" => $_POST["txtharga"],
            "url" => $_POST["txturl"]
        );

        $_SESSION["menu".count($_SESSION)] = $makanan;

        // print_r($_SESSION);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukkan Data Makanan</title>
    <style>
        .important {
            color: red;
        }
        h1 { 
            text-align: center; 
        }
        #container {
            align: center;
            width: fit-content;
            border: solid;
            margin-top: 10px; margin-bottom: -10px;
            margin-left: -10px; margin-right: auto;
            text-align: center;
            padding-top: 10px; padding-bottom:10px;
            padding-left: 20px; padding-right: 20px;
            position:absolute;
        }
        #outer {
            align: center;
            margin: auto;
            background: orange;
            height:345px;
            width:390px;
        }
    </style>
    <script type="text/javascript" src="js/jquery-3.7.0.js"></script>
</head>
<body>
    <h1>Isikan Data Makanan yang Akan Ditampilkan</h1>
    <div id="outer">    
        <div id="container">
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <p>
                    <label>Kode Makanan <span class="important">*</span> : </label>
                    <input type="text" name="txtkode" required>
                </p>
                <p>
                    <label>Nama Makanan <span class="important">*</span> : </label>
                    <input type="text" name="txtnama" required>
                </p>
                <p>
                    <label>Harga Makanan <span class="important">*</span> : </label>
                    <input type="number" name="txtharga" required>
                </p>
                <p>
                    <label>Alamat Foto Makanan <span class="important">*</span> : </label>
                    <input type="url" name="txturl" required>
                </p>
                <p>
                    <input type="submit" value="Masukkan Data" name="btnmasuk">
                </p>
            </form>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <p>
                    <input type="submit" value="Menuju halaman Pesan" name="btnOrder">
                </p>
            </form>
            Dibuat oleh: <br>
            160421001 / Ignatius Steven Christopher B. <br>
            160421005 / Felicia <br>
            160421058 / Andreas Bayu Prakasa <br>
        </div>
    </div>
</body>
<?php
    if (isset($_POST["btnmasuk"])) {
        $count = count($_SESSION);
        if ($count == 0) {
            add_menu();
            echo "<script>alert('Makanan berhasil ditambahkan')</script>";
        } else {
            foreach ($_SESSION as $menu) {
                if ($menu["kode"] == $_POST["txtkode"]) {
                    echo "<script>alert('Kode makanan sudah digunakan. Gunakan kode yang lain.')</script>";
                } 
                else{
                    add_menu();
                    echo "<script>alert('Makanan berhasil ditambahkan')</script>";
                    break;
                }
            }
        }
    }
       
    if (isset($_POST["btnOrder"])) {
        header("location:order.php");
    }
?>
</html>