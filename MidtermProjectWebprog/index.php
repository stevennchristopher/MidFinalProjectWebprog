<?php
    session_start();

    if (isset($_POST["btnsimpansetting"])) {
        setcookie("setting[alamat]", $_POST["rdoalamat"], time() + (3600 * 24 * 365));
        setcookie("setting[ipk]", $_POST['txtipk'], time() + (3600 * 24 * 365));
        setcookie("setting[ukuran]", $_POST['txtsize'], time() + (3600 * 24 * 365));
        setcookie("setting[fontstyle]", $_POST['selstyle'], time() + (3600 * 24 * 365));
        setcookie("setting[showalamat]", $_POST['rdoalamatshow'], time() + (3600 * 24 * 365));
        setcookie("setting[showipk]", $_POST['rdoipkshow'], time() + (3600 * 24 * 365));
    }

    if (isset($_SESSION["student"])) {
        $arr_std = $_SESSION["student"];
    }

    if (isset($_POST["btnsimpaninput"])) {
        $std = array(
            "nrp" => $_POST["txtnrp"],
            "nama" => $_POST["txtnama"],
            "alamat" => $_POST["txtalamat"],
            "ipk" => $_POST["txtipk"]
        );

        $arr_std[] = $std;
    
        $_SESSION["student"] = $arr_std;
    
        header("Location: display.php");
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
    <style>
        p {
            font-size: medium; 
            font-style: normal;
        }
    </style>
</head>
<body>
    <div class="spacing"></div>
        <div class="container">
            <h1><b>Selamat Datang!</b></h1>

            <p><a href="input.php">Input Data Disini</a></p>
            <p><a href="display.php">Lihat Hasil Pengisian Data Disini</a></p>
            <p><a href="setting.php">Atur Tampilan Disini</a></p>

            <br>
            <p>
                <b>Dibuat Oleh:</b>
                <ol>
                    <li>Ignatius Steven Christopher B. (160421001)</li>
                    <li>Felicia (160421005)</li>
                    <li>Andreas Bayu Prakasa (160421058)</li>
                </ol>
            </p>
        </div>
    </div>
</body>
</html>