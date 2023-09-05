<?php
    $alamat_input = "";
    $ipk_input = "";
    $font_size = "";
    $font_style = "";
    $alamat_display = "";
    $ipk_display = "";

    if (isset($_COOKIE["setting"])) {
        $arr_sett = $_COOKIE["setting"];
        
        $alamat_input = isset($arr_sett["alamat"]) ? $arr_sett["alamat"] : "";
        $ipk_input = isset($arr_sett["ipk"]) ? $arr_sett["ipk"] : "";
        $font_size = isset($arr_sett["ukuran"]) ? $arr_sett["ukuran"] : "";
        $font_style = isset($arr_sett["fontstyle"]) ? $arr_sett["fontstyle"] : "";
        $alamat_display = isset($arr_sett["showalamat"]) ? $arr_sett["showalamat"] : "";
        $ipk_display = isset($arr_sett["showipk"]) ? $arr_sett["showipk"] : "";

    //     foreach ($arr_sett as $key => $val){
    //         if($key == "alamat"){
    //             $alamat_input = $val;
    //         }
    //         if ($key == "ipk") {
    //             $ipk_input = $val;
    //         }
    //         if ($key == "ukuran") {
    //             $ukuran_font = $val;
    //         }
    //         if ($key == "fontstyle") {
    //             $style_font = $val;
    //         }
    //         if ($key == "showalamat") {
    //             $alamat_display = $val;
    //         }
    //         if ($key == "showipk") {
    //             $ipk_display = $val;
    //         }
    //     }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="spacing"></div>
        <div class="container">
            <h1><b>Pengaturan Tampilan</b></h1>
            <?php 
                $todo = "";
                if (isset($_GET["todo"])) {
                    $todo = $_GET["todo"];
                    switch ($todo) {
                        case "1":
                            echo "<p>Anda belum pernah mengakses web ini. Silahkan atur tampilan website ini.</p>";
                    }
                }
            ?>
            <form method="POST" action="index.php" enctype="multipart/form-data">
                <p>
                    <label>Alamat wajib diisi? </label>
                    <input type="radio" name="rdoalamat" value="y" <?php if ($alamat_input == "y") echo "checked"; ?> required>Ya</input>
                    <input type="radio" name="rdoalamat" value="n" <?php if ($alamat_input == "n") echo "checked"; ?>>Tidak</input>
                </p>
                <p>
                    <label>Default IPK: </label>
                    <input type="number" step="any" name="txtipk" min="0" max="4" value=<?php echo $ipk_input; ?> required>
                </p>
                <p>
                    <label>Ukuran Font: </label>
                    <input type="number" name="txtsize" min="1" value=<?php echo $font_size; ?> required></input><label> px</label>
                </p>
                <p>
                    <label>Tampilan Font: </label>
                    <select name="selstyle" required>
                        <option value="">-- Pilih Tampilan --</option>
                        <option value="b" <?php if ($font_style == "b") echo "selected"; ?>>Bold</option>
                        <option value="i" <?php if ($font_style == "i") echo "selected"; ?>>Italic</option>
                        <option value="u" <?php if ($font_style == "u") echo "selected"; ?>>Underline</option>
                    </select>
                </p>  
                <p>
                    <label>Alamat ditampilkan? </label>
                    <input type="radio" name="rdoalamatshow" value="y" <?php if ($alamat_display == "y") echo "checked"; ?> required>Ya</input>
                    <input type="radio" name="rdoalamatshow" value="n" <?php if ($alamat_display == "n") echo "checked"; ?>>Tidak</input>
                </p>
                <p>
                    <label>IPK ditampilkan? </label>
                    <input type="radio" name="rdoipkshow" value="y" <?php if ($ipk_display == "y") echo "checked"; ?> required>Ya</input>
                    <input type="radio" name="rdoipkshow" value="n" <?php if ($ipk_display == "n") echo "checked"; ?>>Tidak</input>
                </p>
                <p>
                    <input type="submit" name="btnsimpansetting" value="Simpan">
                </p>
            </form>
            <p style="font-size: medium; font-style: normal;"><a href='index.php'>Kembali ke Halaman Utama</a></p>
        </div<>
    </div<>
</body>
</html>