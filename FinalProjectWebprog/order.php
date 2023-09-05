<?php
    session_start();
    
    if (isset($_SESSION)) {
        $arr_makanan = $_SESSION;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Makanan</title>
    <style type="text/css">
        .katalog {
            width: "40%";
            float: left;
            border-style: solid;
            margin: 5px;
            margin-left: 25px;
            margin-right: 25px;
            margin-bottom: 25px;
            margin-top: 25px;
        }

        img {
            width: 200px;
            height: 140px;
            text-align: center;
            margin: 5px;
        }
        
        .inilah-menu{
            margin-left: 25px;
            margin-bottom: 0px;
        }

        .nama-menu {
            margin-top: 0px;
            margin-left: 5px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        h3 {
            margin: 5px;
        }

        button {
            margin: 6px;
        }

        .menu {
            width: 70%;
            float: left;
        }

        .pilihan {
            border: solid 2px;
            padding-left:10px; padding-top:-20px;
            float: right;
            width: 300px;
            margin-right:20px;
            margin-top: 25px;
        }
    </style>
</head>
<script type="text/javascript" src="js/jquery-3.7.0.js"></script>
<body>
    <h1 class="inilah-menu">Inilah Menu Untuk Hari Ini</h1>
    <div class="menu">
        <?php
            foreach ($arr_makanan as $makanan) {
                echo "<div class='katalog'>";
                echo "<img src='".$makanan['url']."'>";
                echo '<h2 class="nama-menu">'.$makanan['nama'].'</h2>';
                echo '<h3> Rp. '.$makanan['harga'].'</h3>';
                echo "<button class='btnPilih' id='btnPilih".$makanan['kode']."' nama='".$makanan['nama']."' harga='".$makanan['harga']."'>Pilih</button>";
                echo "</div>";
            }
        ?>
    </div>

    <script type="text/javascript">
        function grandTotal() {
            var total = 0;
            $(".hargapermenu").each(function() {
                total += $(this).attr("value") * 1;
            })
            $("#grandtotal").html(total);
        }
        $(".btnPilih").click(function(){
            $(this).attr("disabled", true);
            var nama = $(this).attr('nama');
            var harga = $(this).attr('harga');
            $(".hargaTambah").append("<p class='hargapermenu' value='" + harga + "'>" + nama + " (Rp. " + harga + ")</p>");
            grandTotal();
        });
    </script>
    
    <div class="pilihan">
        <h1>Pilihanku: </h1>
        <div class="hargaTambah"></div>
        <h2>TOTAL : Rp. <span id='grandtotal'>0</span></h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <p>
                <input type="submit" value="Menuju halaman Masukkan Data" name="btnIndex">
            </p>
        </form>
    </div>
</body>

</html>