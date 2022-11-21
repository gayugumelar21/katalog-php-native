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
				<form action="daftar_produk.php">
					<input type="text" name="search" placeholder="Cari Produk">
					<input type="submit" name="cari" value="Cari Produk">
				</form>
			</div>
		</div>
	</div>

	<!-- category -->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php 
					$kategori = mysqli_query($kon, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="daftar_produk.php?kat=<?php echo $k['category_id'] ?>">
						<div class="col-5">
							<img src="img/icon-kategori.png" width="50px" style="margin-bottom:5px;">
							<p><?php echo $k['category_name'] ?></p>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

    <!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
				<?php 
					$produk = mysqli_query($kon, "SELECT * FROM tb_produk  ORDER BY produk_id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
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