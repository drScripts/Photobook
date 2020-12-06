<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>


<div class="container-fluid mt-5">
    <h1>Checkout</h1>
    <hr>
    <div class="row">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Nama Project</th>
                <th>Subharga</th>
            </tr>

            <?php
            $no = 1;
            $id_user = $_SESSION['pelanggan']['id_pelanggan'];

            $ambil1 = $koneksi->query("SELECT * FROM keranjang JOIN produk ON keranjang.id_produk=produk.id_produk  WHERE id_pelanggan = '$id_user'");
            $total_belanja = 0;
            while ($pecah = $ambil1->fetch_assoc()) { ?>
            <!-- <?php
                        echo "<pre>";
                        print_r($pecah);
                        echo "</pre>"; ?> -->
            <?php $subtotal = $pecah['harga'];
                // echo $subtotal;
                ?>

            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo     $pecah['nama_produk'] ?></td>
                <td>Rp. <?php echo     number_format($pecah['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $pecah['nama_pro'] ?></td>
                <td>Rp. <?php echo number_format($subtotal, 0, ',', '.') ?></td>

            </tr>

            <?php $no++; ?>
            <?php $total_belanja += $subtotal ?>
            <?php } ?>
            <tr>
                <th colspan="4">Total Belanja</th>
                <th>Rp. <?php echo number_format($total_belanja, 0, ',', '.') ?></th>
            </tr>

        </table>


    </div>
    <div class="row">
        <div class="col-md-4">
            <form method="post" enctype="multipart/form-data">
                <div class="from-group">
                    <label class="text-small">Nama</label>
                    <input class="form-control" type="text" readonly
                        value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
                </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-small">No.telp <strong><span class="text-danger">(pastikan Nomor
                            benar)</span></strong></label>
                <input class="form-control" type="text" readonly
                    value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-small">Email <strong> <span class="text-danger">(email harus benar untuk nomor
                            resi)</span></strong></label>
                <input class="form-control" type="text" readonly
                    value="<?php echo $_SESSION['pelanggan']['email_pelanggan'] ?>">
            </div>
        </div>
        </form>
        <p class="text-danger">*bila ada yang tidak sesuai silahkan ubah <a href="profilecheck.php">di sini.</a></p>
    </div>
    <h3>Alamat Anda</h3>
    <hr>
    <form action="aksicheck.php" method="post">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>*Provisi</label>
                    <select class="form-control" name="nama_provinsi">

                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>*Kota/Kabupaten</label>
                    <select class="form-control" name="nama_kota">

                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>*Kurir</label>
                    <select class="form-control" name="nama_kurir">

                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>*Jenis</label>
                    <select class="form-control" name="jenis">

                    </select>
                </div>
            </div>
        </div>
        <input type="text" name="berat" value="1200" required hidden>
        <input type="text" name="di_prov" required hidden>
        <input type="text" name="di_kota" required hidden>
        <input type="text" name="type" required hidden>
        <input type="text" name="kodepos" required hidden>
        <input type="text" name="ekspedisi_kurir" required hidden>
        <input type="text" name="jenis_paket" required hidden>
        <input type="text" name="estimasi" required hidden>
        <input type="text" name="ongkir" required hidden>
        <input type="text" name="total" required hidden value="<?php echo $total_belanja ?>">

        <label for='alamat'><strong>Alamat lengkap (sertakan kodepos)</strong></label>
        <?php
        $lengkap = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_user' ");
        $almt = $lengkap->fetch_assoc();
        ?>

        <?php $hadau = $almt['alamat_lengkap'] ?>
        <textarea class="form-control" name="alamat_lengkap" id="alamat"
            placeholder="Alamat lengkap Anda beserta kodepos" required readonly><?php echo $hadau ?></textarea>
        <a href="keranjang.php" class="btn btn-secondary mt-5"><i class="fas fa-arrow-left"></i> Cancel</a>
        <div align="right">
            <button type="sumbit" class="btn btn-secondary ml-auto" name="submit"
                onclick="return confirm('apakah anda yakin ?');">Selesai</button>
        </div>
    </form>




    <div class="row mb-5"></div>
    <div class="row mb-5"></div>



    <script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: 'post',
            url: 'ongkir/data_provinsi.php',
            success: function(hasil) {
                // alert("oke");
                $("select[name=nama_provinsi]").html(hasil);
                // console.log(hasil);
            }
        });
        $("select[name=nama_provinsi]").on("change", function() {
            var id_provinsi_pilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: 'post',
                url: 'ongkir/data_kota.php',
                data: 'id_provinsi=' + id_provinsi_pilih,
                success: function(udin) {
                    $("select[name=nama_kota]").html(udin);
                }
            });
        });
        $.ajax({
            type: 'post',
            url: 'ongkir/kurir.php',
            success: function(kurir) {
                $("select[name=nama_kurir]").html(kurir);
            }

        });
        $("select[name=nama_kurir]").on("change", function() {
            // mendapatkan kurir
            var kurir_pilih = $("select[name=nama_kurir]").val();
            // alert(kurir_pilih);
            // mendapatkan id kota/id_city
            var kota_pilih = $("option:selected", "select[name=nama_kota]").attr("id_kota");
            // alert(kota_pilih);
            // mendapatkan berat
            var berat_pilih = $("input[name=berat]").val();
            // alert(berat_pilih);
            $.ajax({
                type: 'post',
                url: 'ongkir/jenis.php',
                data: 'ekspedisi=' + kurir_pilih + '&kota=' + kota_pilih + '&berat=' +
                    berat_pilih,
                success: function(semua) {
                    $("select[name=jenis]").html(semua);

                    $("input[name=ekspedisi_kurir]").val(kurir_pilih);

                }
            })
        });
        $("select[name=nama_kota]").on("change", function() {
            var prov = $("option:selected", this).attr("nama_provinsi");
            var kota = $("option:selected", this).attr("nama_kota");
            var tipe = $("option:selected", this).attr("type");
            var pos = $("option:selected", this).attr("kodepos");

            $("input[name=di_prov]").val(prov);
            $("input[name=di_kota]").val(kota);
            $("input[name=type]").val(tipe);
            $("input[name=kodepos]").val(pos);
        });
        $("select[name=jenis]").on("change", function() {
            var jenis = $("option:selected", this).attr("jenis");
            var harga = $("option:selected", this).attr("harga");
            var estimasi = $("option:selected", this).attr("etd");

            $("input[name=jenis_paket]").val(jenis);
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(harga);
        });
    })
    </script>




    <?php require_once 'templates/footer.php' ?>