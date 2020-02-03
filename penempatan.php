<?php
include 'koneksi.php';
if(isset($_GET['act']) && $_GET['act'] == 'delete') {
  $kd_penempatan = $_GET['id'];
  $data = mysqli_query($db, "DELETE FROM penempatan WHERE kd_penempatan='$kd_penempatan'")or die(mysqli_error());
}

if(isset($_POST['update'])){
  $tglpenempatan = addslashes($_POST['tglpenempatan']);
  $lokasi = addslashes($_POST['lokasi']);
  $kd_pindah = addslashes($_POST['kd_pindah']);
  $lama = addslashes($_POST['lama']);
  $kd_barang = addslashes($_POST['kd_barang']);
  $nama = addslashes($_POST['nama']);
  $kd_penempatan = addslashes($_POST['kd_penempatan']);
  $data =  mysqli_query($db, "UPDATE penempatan SET lokasi='".$lokasi."',kd_pindah='".$kd_pindah."',tglpenempatan='".$tglpenempatan."' where kd_penempatan='".$_GET['id']."'");
  $data =  mysqli_query($db, "INSERT INTO history1 SET  kd_penempatan='".$kd_penempatan."',nama='".$nama."',kd_barang='".$kd_barang."',loklama='".$lama."',lokbaru='".$lokasi."',kd_pindah='".$kd_pindah."',tglubah='".$tglpenempatan."' ");
}

if(isset($_POST['tambah'])){
  $kd_penempatan1 = addslashes($_POST['kd_penempatan1']);
  $kd_barang1 = addslashes($_POST['kd_barang1']);
  $nama1 = addslashes($_POST['nama1']);
  $lokasi1 = addslashes($_POST['lokasi1']);
  $tglpenempatan1 = addslashes($_POST['tglpenempatan1']);
      $data1 = mysqli_query($db, "INSERT INTO penempatan VALUES ('$kd_penempatan1','','$kd_barang1','$nama1','$lokasi1','$tglpenempatan1')");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="data.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Data Asset</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penempatan" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Penempatan</span>
        </a>
        <div id="penempatan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih:</h6>
            <a class="collapse-item" href="penempatan.php">Data Penempatan</a>
            <a class="collapse-item" href="history.php">History</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="lokasi.php">
          <i class="fas fa-fw fa-search-location"></i>
          <span>Lokasi</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="kategori.php">
          <i class="fas fa-fw fa-object-ungroup"></i>
          <span>Kategori Produk</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="barcode1.php">
          <i class="fas fa-fw fa-qrcode"></i>
          <span>Barcode</span></a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="penempatan.php" method="POST">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="cari" id="cari">
              <div class="input-group-append">
                <button class="btn btn-danger" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search" action="penempatan.php" method="POST">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="cari" id="cari">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Trisula Indonesia</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Penempatan Barang</h1>
          </div>

          
					<!-- DataTales Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
          <a class="btn border-info btn-danger text-white" data-target="#tambah" data-toggle="modal" role="button">Tambah</a>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
            Export File
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Export to :</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <a href="pdftempat.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export to PDF</a>
                  <a href="exceltempat.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Export to Excel</a>
                </div>
              </div>
            </div>
          </div>
          <a class="btn border-info btn-success text-white" role="button" href="history.php">History</a>
					</h6>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<form action="penempatan.php" method="POST">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NO</th>
                                        <th>Kode Penempatan</th>
										<th>Kode Barang</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal Penempatan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
                                <?php
                                 $page = (isset($_GET['page']))? $_GET['page'] : 1;
                                 $limit = 2;                               
                                 $limit_start = ($page - 1) * $limit;
                                 $no = $limit_start + 1;
                                    if(isset($_POST['cari'])) {
                                        $cari  = $_POST['cari'];
                                        $result  = mysqli_query($db, "SELECT * FROM penempatan WHERE kd_penempatan LIKE '%$cari%' OR kd_barang LIKE '%$cari%' OR nama LIKE '%$cari%' OR lokasi LIKE '%$cari%' OR tglpenempatan LIKE '%$cari%' LIMIT ".$limit_start.",".$limit." ");
                                        if(mysqli_num_rows($result)>0){
                                          while($isi = mysqli_fetch_array($result)){ 
                                ?>
                                  
                                    <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $isi['kd_penempatan']; ?></td>
                                    <td><?= $isi['kd_barang']; ?></td>
                                    <td><?= $isi['lokasi']; ?></td>
                                    <td><?= $isi['tglpenempatan']; ?></td>
                                    <td>
                                    <a class="update badge badge-info text-white" data-target="#view-<?= $isi['kd_penempatan']; ?>" data-toggle="modal" role="button" value="id=<?= $isi['kd_penempatan']?>">VIEW</a> |
                                    <a class="edit badge badge-primary text-white" data-target="#edit-<?= $isi['kd_penempatan']; ?>" data-toggle="modal" role="button" value="id=<?= $isi['kd_penempatan']?>">Edit</a> |
                                    <a class="del badge badge-danger" role="button" href="penempatan.php?id=<?= $isi['kd_penempatan']; ?>&act=delete">Hapus</a>
                                    </tr>
                                    <?php
                                        }
                                        }else{
                                    ?>
                                        <td colspan="6" class="text-center"><?= "database tidak ditemukan"; ?></td>
                                    <?php
                                        }
                                    }else {
                                      $data = mysqli_query($db,"SELECT *from penempatan LIMIT ".$limit_start.",".$limit." ");
                                      $no = $limit_start + 1;
                                        while($isi = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $isi['kd_penempatan']; ?></td>
                                    <td><?= $isi['kd_barang']; ?></td>
                                    <td><?= $isi['lokasi']; ?></td>
                                    <td><?= $isi['tglpenempatan']; ?></td>
                                    <td>
                                    <a class="edit badge badge-info text-white" data-target="#view-<?= $isi['kd_penempatan']; ?>" data-toggle="modal" role="button" value="id=<?= $isi['kd_penempatan']?>">VIEW</a> |
                                    <a class="edit badge badge-primary text-white" data-target="#edit-<?= $isi['kd_penempatan']; ?>" data-toggle="modal" role="button" value="id=<?= $isi['kd_penempatan']?>">Edit</a> |
                                    <a class="del badge badge-danger" role="button" href="penempatan.php?id=<?= $isi['kd_penempatan']; ?>&act=delete">Hapus</a>    
                                    </tr>
                                    <?php } }?>
								</tbody>
							</table>
              <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <!-- LINK FIRST AND PREV -->
                <?php
                if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                ?>
                  <li class="page-item"><a class="page-link" href="#">First</a></li>
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <?php
                }else{ // Jika page bukan page ke 1
                  $link_prev = ($page > 1)? $page - 1 : 1;
                ?>
                  <li class="page-item"><a href="penempatan.php?page=1" class="page-link">First</a></li>
                  <li class="page-item"><a class="page-link" href="penempatan.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                <?php
                }
                ?>
                
                <!-- LINK NUMBER -->
                <?php
                // Buat query untuk menghitung semua jumlah data
                $sql2 = mysqli_query($db, "SELECT COUNT(*) AS jumlah FROM penempatan");
              
                $get_jumlah = mysqli_fetch_array($sql2);
                
                $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                
                for($i = $start_number; $i <= $end_number; $i++){
                  $link_active = ($page == $i)? ' class="active"' : '';
                ?>
                  <li class="page-item"<?php echo $link_active; ?>><a class="page-link" href="penempatan.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
                }
                ?>
                
                <!-- LINK NEXT AND LAST -->
                <?php
                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                // Artinya page tersebut adalah page terakhir 
                if($page == $jumlah_page){ // Jika page terakhir
                ?>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">Last</a></li>
                <?php
                }else{ // Jika Bukan page terakhir
                  $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                ?>
                  <li class="page-item"><a class="page-link" href="penempatan.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                  <li class="page-item"><a class="page-link" href="penempatan.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                <?php
                }
                ?>
              </ul>
              </nav>

						</form>
					</div>
				</div>

            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Trisula Indonesia 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-10">
						<form action="penempatan.php" method="POST" enctype="multipart/form-data">
							<table class="table table-borderless">
								<tr>
									<th>Kode Penempatan</th>
									<td>
										<input type="text" name="kd_penempatan1">
									</td>
								</tr>
                <tr>
                  <th>Kode Barang</th>
                    <td>
                    <?php
                    $query=mysqli_query($db, "SELECT * FROM data_barang");
                    $jsArray = "var nama = new Array();\n"; 
                    ?>
                      <select name="kd_barang1" onchange="changeValue(this.value)" >
                          <option>- Pilih -</option>
                          <?php if(mysqli_num_rows($query)) {?>
                              <?php while($data= mysqli_fetch_array($query)) {?>
                                  <option value="<?php echo $data["kd_barang"]?>"> <?php echo $data["kd_barang"]?> </option>
                              <?php $jsArray .= "nama['" . $data['kd_barang'] . "'] = {nama:'" . addslashes($data['nama']) . "'};\n"; } ?>
                          <?php } ?>
                      </select>
                    </td>
                </tr>
                <tr>
                  <th>Nama Barang</th>
                  <td><input type="text" name="nama1" id="nama" value="" readonly="readonly"></td>
                </tr>
                <tr>
                  <th>Lokasi</th>
                  <td>
                   <select name="lokasi1" value="<?= $isi['lokasi']; ?>">
                    <option>- Pilih -</option>
                    <?php
                    $dataq = mysqli_query($db, "SELECT * from lokasi");
                    while($isiq = mysqli_fetch_array($dataq)){
                    ?>
                    <option value="<?= $isiq['lokasi']; ?>"><?= $isiq['lokasi']; ?></option>
                    <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                   <th>Tanggal Penempatan</th>
                   <td><input type="date" name="tglpenempatan1"></td>
                 </tr>
                 <tr>
                     <td>
                       <input type="submit" value="tambah" class="btn btn-outline-primary" name="tambah">
                     </td>
                  </tr>

              </table>
						</form>
            <script type="text/javascript">
            <?php echo $jsArray; ?>
            function changeValue(kd_barang) {
              document.getElementById("nama").value = nama[kd_barang].nama;
            };
            </script>
					</div>
				</div>
			</div>
		</div>
	</div>

  <?php
	$data = mysqli_query($db, "SELECT * FROM penempatan");
	while($isi = mysqli_fetch_array($data)){
    ?>
	<div class="modal fade" id="edit-<?= $isi['kd_penempatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-10">
						<form action="penempatan.php?id=<?= $isi['kd_penempatan']; ?>" method="POST" enctype="multipart/form-data">
							<table class="table table-borderless">
              <tr>
									<th>Kode Pindah</th>
									<td>
									<input type="text" name="kd_pindah" placeholder="isi selain ''<?= $isi['kd_pindah']; ?>''">
									</td>
                </tr>
              <tr>
									<th>Kode Penempatan</th>
									<td>
                                    <input type="hidden" name="kd_penempatan" value="<?= $isi['kd_penempatan']; ?>" >
									<?= $isi['kd_penempatan']; ?>
									</td>
                </tr>
								<tr>
									<th>Kode Barang</th>
									<td>
                                    <input type="hidden" name="kd_barang" value="<?= $isi['kd_barang']; ?>">
                                    <?= $isi['kd_barang']; ?>
									</td>
                </tr>
                <tr>
                  <th>Nama Barang</th>
                  <td><input type="hidden" name="nama" value="<?= $isi['nama']; ?>">
                  <?= $isi['nama']; ?></td>
                </tr>
                <tr>
                  <th>Lokasi Sekarang</th>
                  
                   <td ><input type="hidden" name="lama" value="<?= $isi['lokasi']; ?>" >
                   <?= $isi['lokasi']; ?></td>
                   </td>
                   
                <tr>
                  <th>Pindah Lokasi</th>
                  <td>
                    <select name="lokasi" value="<?= $isi['lokasi']; ?>">
                    <option value=''>- Pilih -</option>
                    <?php
                    $dataq = mysqli_query($db, "SELECT * from lokasi");
                    while($isiq = mysqli_fetch_array($dataq)){
                    ?>
                    <option value="<?= $isiq['lokasi']; ?>"><?= $isiq['lokasi']; ?></option>
                    <?php } ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>Tanggal Penempatan</th>
                  <td><input type="date" name="tglpenempatan" value="<?= $isi['tglpenempatan']; ?>"></td>
                </tr>
								<tr>
									<td>
										<input type="submit" value="update" class="btn btn-outline-primary" name="update">
									</td>
                </tr>
              </table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div></div>
	<?php } ?>



  <?php
    $data = mysqli_query($db, "SELECT * FROM penempatan");
    while($isi = mysqli_fetch_array($data)){
  ?>
  <div class="modal fade" id="view-<?= $isi['kd_penempatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><?= $isi['kd_penempatan']; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="col-md-10">
						<form action="penempatan.php" enctype="multipart/form-data">
							<table class="table table-borderless">
								<tr>
									<th>Kode Penempatan</th>
									<td>
										<?= $isi['kd_penempatan']; ?>
									</td>
								</tr>
								<tr>
									<th>Kode Barang</th>
									<td>
                    <?= $isi['kd_barang']; ?>
									</td>
                </tr>
               <tr>
                  <th>Barang</th>
                    <td>
                    <?= $isi['nama']; ?>
                    </td>
                </tr>
                <tr>
                  <th>Lokasi</th>
                    <td>
                    <?= $isi['lokasi']; ?>
                    </td>
                </tr>
                <tr>
                  <th>Tanggal Penempatan</th>
                    <td><?= $isi['tglpenempatan']; ?> </td>
                </tr>
              </table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php } ?>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


</body>
</html>