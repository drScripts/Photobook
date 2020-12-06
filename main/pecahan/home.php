 <div class="container-fluid">
              <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="../foto/1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../foto/2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../foto/3.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../foto/4.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                 </a>
            </div>
        
          <!-- Content Row -->

          <div class="row mt-5">
            <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){ ?>
            <div class="col-md-3">
              <div class="card" style="width:15rem;">
                <img class="card-img-top" src="../foto produk/<?php echo $pecah['foto'] ?>" width="250px" height="200px">
                <div class="card-body">
                  <div class="row">
                    <div class="col ml-5">
                    </div>
                    <hr>
                    <div class="col">
                     
                    </div>
                    <div class="col">
                       <a href="pecahan/beli.php?id=<?php echo $pecah['id_produk'] ?>"  style="color:grey;" ><i class="fas fa-plus-square fa-lg ml-5"></i></a>
                    </div>
                </div>
                <h5 class="card-title"><?php echo $pecah['nama_produk'] ?></h5>
                <h6 class="small"><?php echo $pecah['berat']; ?>Gr</h6>
                <p class="card-text">Rp. <?php echo number_format($pecah['harga'],0,',','.') ?></p>
                <a href="" class="btn btn-info mr-5"><i class="fas fa-search-plus"></i> Detail</a>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
