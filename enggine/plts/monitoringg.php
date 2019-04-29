<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="p5.min.js"></script>
    <script src="p5.dom.min.js"></script>
    <script src="p5.sound.min.js"></script>
    <script src="p5.serialport.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <mta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Controller Arus</title>

    <!-- Load file bootstrap.min.css yang ada di folder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .align-middle {
            vertical-align: middle !important;
        }
    </style>
</head>
<body>
    <!-- Membuat Menu Header / Navbar -->
  

    <div style="padding: 0 15px;">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tr>
                    <th class="text-center">ID Pelanggan</th>
                    <th>No Meter</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Id Rumah</th>
                    <th>Bulan</th>
                    <th>Status</th>
                </tr>
                <?php
                include "koneksi.php";
                // Cek apakah terdapat data pada page URL
                $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                $limit = 1; // Jumlah data per halamanya

                // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                $limit_start = ($page - 1) * $limit;
                // SELECT pelanggan.id_pelanggan, pelanggan.nama, pelanggan.alamat, pelanggan.id_rumah, tagihan.bulan, tagihan.status FROM pelanggan INNER JOIN tagihan ON pelanggan.id_pelanggan = tagihan.id_pelanggan WHERE tagihan.status ='belum bayar'
                $sql = $pdo->prepare("SELECT pelanggan.id_pelanggan, pelanggan.nama, pelanggan.no_meter, pelanggan.alamat, pelanggan.id_rumah, tagihan.bulan, tagihan.status FROM pelanggan INNER JOIN tagihan ON pelanggan.id_pelanggan = tagihan.id_pelanggan WHERE tagihan.status ='belum bayar' ORDER BY pelanggan.nama ASC LIMIT ".$limit_start.",".$limit);
                // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
               // $sql = $pdo->prepare("SELECT * FROM pelanggan LIMIT ".$limit_start.",".$limit);
                $sql->execute(); // Eksekusi querynya

                $no = $limit_start + 1; // Untuk penomoran tabel
                while ($data = $sql->fetch()) { // Ambil semua data dari hasil eksekusi $sql
                ?>
               
                    <tr>
                        
                        <td class="align-middle"><?php echo $data['id_pelanggan']; ?></td>
                        <td class="align-middle"><?php echo $data['no_meter']; ?></td>
                        <td class="align-middle"><?php echo $data['nama']; ?></td>
                        <td class="align-middle"><?php echo $data['alamat']; ?></td>
                        <td class="align-middle"><?php echo $data['id_rumah']; ?></td>
                        <td class="align-middle"><?php echo $data['bulan']; ?></td>
                        <td class="align-middle"><?php echo $data['status']; ?></td>
                    </tr>
                    <script>
														 var serial; 
														 var options = { baudrate: 9600}; 
														 var portName = 'COM3'; 
														 var inData; var outByte = 0; 
														 function setup() {
																serial = new p5.SerialPort(); 
																serial.on('data', serialEvent); 
																serial.on('error', serialError); 
																serial.open(portName, options); 
																} 
																
																function serialEvent() 
																{ 
																	var inByte = serial.read();
																	 inData = inByte; 
																	 } 
																	 function serialError(err) { 

																	 } function draw() { 
																		 serial.write("<?php echo $data['id_rumah'] ?>");  
																		 } 
																		 </script>
                <?php
                $no++; // Tambah 1 setiap kali looping
                }
                ?>
            </table>
        <div>

        <!--
        Buat paginationnya
        Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang
        bagus tentunya -->
        <ul class="pagination">
            <!-- LINK FIRST AND PREV -->
            <?php
            if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
            ?>
                <li class="disabled"><a href="#">First</a></li>
                <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
            } else { // Jika buka page ke 1
                $link_prev = ($page > 1) ? $page - 1 : 1;
            ?>
                <li><a href="monitoringg.php?page=1">First</a></li>
                
                <li><a href="monitoringg.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
            <?php
            }
            ?>

            <!-- LINK NUMBER -->
            <?php
            // Buat query untuk menghitung semua jumlah data
            $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM pelanggan");
            $sql2->execute(); // Eksekusi querynya
            $get_jumlah = $sql2->fetch();

           // $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamanya
           $jumlah_page = 12;
            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? 'class="active"' : '';
            ?>
                <li <?php echo $link_active; ?>><a href="monitoringg.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php
            }
            ?>

            <!-- LINK NEXT AND LAST -->
            <?php
            // Jika page sama dengan jumlah page, maka disable link NEXT nya
            // Artinya page tersebut adalah page terakhir
            if ($page == $jumlah_page) { // Jika page terakhir
            ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
                <li class="disabled"><a href="#">Last</a></li>
            <?php
            } else { // Jika bukan page terakhir
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
            ?>
            
                <li><a href="monitoringg.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                <li><a href="monitoringg.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</body>
</html>