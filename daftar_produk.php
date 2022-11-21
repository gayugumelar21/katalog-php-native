<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <header>
            <div class="container">
                <h1><a href="index.php">KatalogApp</a></h1>
                <ul>
                    <li><a href="daftar_produk.php">Daftar Produk</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="kategori.php">Data Kategori</a></li>
                    <li><a href="produk.php">Data Produk</a></li>
                </ul>
            </div>
    </header>

    <!-- search -->
	<div class="container">
		<div class="box">
			<div class="search">
				<form action="daftar_produk.php" method="GET">
					<input type="text" name="cari_produk" placeholder="Cari Produk" value="">
					<input type="submit" value="Cari Produk">
				</form>
				<?php
					if(isset($_GET['cari_produk'])){
						$cari_produk = $_GET['cari_produk'];
						echo "Hasil Pencarian : ".$cari_produk;
					}
				?>
			</div>
		</div>
	</div>

    <!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">

			<?php
				if(isset($_GET['cari_produk'])){
					$cari_produk = $_GET['cari_produk'];
					$data = mysqli_query($kon, "SELECT * FROM tb_produk  WHERE nama_produk like '%".$cari_produk."%'");
				}
				else{
					$data = mysqli_query($kon, "SELECT * FROM tb_produk");
				}
				if(mysqli_num_rows($data) > 0){
					while($p = mysqli_fetch_array($data)){
			?>	
				<a href="detail_produk.php?id=<?php echo $p['produk_id'] ?>">
					<div class="col-4">
						<img src="produk/<?php echo $p['gambar'] ?>">
						<p class="nama"><?php echo substr($p['nama_produk'], 0, 30) ?></p>
						<p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
					</div>
				</a>
			<?php }}else{ ?>
				<p>Produk tidak ada</p>
			<?php } ?>

				
			</div>
		</div>
	</div>

</body>
</html>