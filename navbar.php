    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                   <a>Selamat Datang di Santuy Shop</a>
            </div>
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <ul class="menu">
                    <?php if(!$_SESSION['pelanggan']){?>
                    <li><a href="login.php">Masuk</a>
                    </li>
                    <li><a href="daftar.php">Daftar</a>
                    </li>
                    <li><a href="contact.php">Kontak</a>
                    </li>
                    <?php }else{ ?>
                    <li><a href="akunsaya.php">Akun Saya</a>
                    </li>
                    <li><a href="orderansaya.php">Riwayat Pembelian</a>
                    </li>
                    <li><a href="contact.php">Kontak</a>
                    </li>
                    <li><a href="logout.php">Keluar</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>


    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header"> 
                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only"><?=nama;?></span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="keranjang.php">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs"><?php if(count($_SESSION['keranjang'])){ echo count($_SESSION['keranjang']);}else{ echo "0"; }?> Produk di Keranjang</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation"> 
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Kategori <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Komputer</h5> 
                                            <ul>
                                                <?php 
                                                    $ambilkategori = $koneksi->query("SELECT * FROM kategori"); 
                                                    while($kategori = $ambilkategori->fetch_assoc()){ 
                                                ?>
                                                <li>
                                                    <a href="kategori.php?id_kategori=<?php echo $kategori['id_kategori']; ?>">
                                                        <?php echo $kategori['nama_kategori']; ?>
                                                    </a>
                                                </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="keranjang.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-xs"><?php if(count($_SESSION['keranjang'])){ echo count($_SESSION['keranjang']);}else{ echo "0"; }?> Produk di Keranjang</span></span></a>
                </div>
                <!--/.nav-collapse -->

            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
