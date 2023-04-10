<?php
include "koneksi.php";
?>
<div class="container">
    <div class="row vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-7 col-lg-10">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="mb-5 mt-3 text-center text-primary">Tambah Data Konsumen</h2>

                    <form action="?page=transaksi/simpan" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Jenis Laundry</label>
                                <select class="form-select" name="id_jenislaundry">
                                <option selected>Pilih Nama Jenis laundry</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "select * from jenis_laundry");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $data['id_jenislaundry'] ?>"><?php echo $data['nama_jenislaundry'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>                            
                            </div>
                            <div class="mb-3">
                            <label class="form-label">qty</label>
                                <input type="text" class="form-control" name="id_jenislaundry">
                                    <?php
                                    $query = mysqli_query($koneksi, "select * from transaksi");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <?php
                                    }
                                    ?>
                                </select>                            
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </div>
                    </form>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>
</div>