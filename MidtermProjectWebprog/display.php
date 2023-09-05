<?php
    session_start();

    if (isset($_SESSION["student"])) {
        $arr_std = $_SESSION["student"];
    }
    else {
        header("location: input.php?todo=2");
    } 

    if (isset($_COOKIE["setting"])) {
        $arr_sett = $_COOKIE["setting"];

        $font_size = isset($arr_sett["ukuran"]) ? $arr_sett["ukuran"] : "";
        $font_style = isset($arr_sett["fontstyle"]) ? $arr_sett["fontstyle"] : "";
        $alamat_display = isset($arr_sett["showalamat"]) ? $arr_sett["showalamat"] : "";
        $ipk_display = isset($arr_sett["showipk"]) ? $arr_sett["showipk"] : "";
    } else {
        header("location: setting.php?todo=1");
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            <?php
                echo "font-size: $font_size;";
                switch ($font_style) {
                    case "b":
                        echo "font-weight: bold;";
                        break;
                    case "i":
                        echo "font-style: italic;";
                        break;
                    case "u":
                        echo "text-decoration: underline;";
                        break;
                }
            ?>
        }
    </style>
</head>
<body>
    <div class="spacing"></div>
        <div class="container">
            <h1><b>Data yang telah diisi dari halaman Input Data</b></h1>
            <?php
                $alamat_ditampilkan = ($alamat_display == "n") ? "hidden" : "";
                $ipk_ditampilkan = ($ipk_display == "n") ? "hidden" : "";

                for ($i = 0; $i < count($arr_std); $i++) {
                    $count = $i + 1;
                    echo $count.".<br>";
                    echo "<p>NRP : ".$arr_std[$i]["nrp"]."</p>";
                    echo "<p>Nama : ".$arr_std[$i]["nama"]."</p>";
                    echo "<p class='$alamat_ditampilkan'>Alamat : ".$arr_std[$i]["alamat"]."</p>";
                    echo "<p class='$ipk_ditampilkan'>IPK : ".$arr_std[$i]["ipk"]."</p>";
                    echo "<br>";
                }
            ?>
            <p style="font-size: medium; font-style: normal;"><a href='index.php'>Kembali ke Halaman Utama</a></p>
        </div>
    </div>
</body>
</html>