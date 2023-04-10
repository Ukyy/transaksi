<?php
include "koneksi.php";
?>

<div class="container">
    <div class="mt-3">
        <h2 class="text-center">Data Transaksi Laundry</h2>
    </div>
    <form action="" method="post">
        Nama jenis laundry :
        <select name="id_jenislaundry" id="">
            <option value="1">baju</option>
            <option value="2">kaos</option>
            <option value="3">celana</option>
        </select>
        <br>
        qty : <input type="text" name="qty">
        <br>
        <button name="simpan">Simpan</button>
        <button name="selesai">Selesai</button>
    
    </form>
    <div class="mt-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Data Transaksi Laundry
            </div>

            <div class="card-body">
                <table class="table table-bordered tabel-striped tabel-hover">
                    <tr class="text-center">
                        <td>No</td>
                        <td>Jenis Laundry</td>
                        <td>Harga</td>
                        <td>Nama Konsumen</td>
                        <td>qty</td>
                        <td>Jumlah</td>
                        <td>Aksi</td>
                    </tr>
                    <?php
                    $i= 1;
                    $total = 0;
                    $query = mysqli_query($koneksi, "SELECT jenis_laundry.nama_jenislaundry,jenis_laundry.tarif,transaksi.id,konsumen.nama_konsumen,transaksi.qty from jenis_laundry,konsumen,transaksi where transaksi.id_jenislaundry=jenis_laundry.id_jenislaundry=konsumen.kode_konsumen and transaksi.status=0");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr align="center">
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['nama_jenislaundry'] ?></td>
                            <td><?php echo $data['tarif'] ?></td>
                            <td><?php echo $data['nama_konsumen'] ?></td>
                            <td><?php echo $data['qty'] ?></td>
                            <td><?php echo $data['qty']*$data['tarif'] ?></td>
                            <td> <button class="btn btn-danger btn-sm"><a style="color:white; text decoration:none;" href="?page=transaksi/hapus&id=<?php echo $data['id'] ?>">Hapus</a></button></td>

                        </tr>
            </div>
        </div>
    <?php
    $total = $data['qty']*$data['tarif']+$total;
                   }
    ?>
    <tr>
        <td colspan="5">Total</td>
        <td><?php echo $total ?></td>
    </tr>
</table>
<?php
if(isset($_POST['simpan'])) { echo "proses simpan";
    $nota = "0" ;
    $id_jenislaundry = $_POST['id_jenislaundry'];
    $qty = $_POST['qty'];
    $kode_konsumen = "1";
    $username = "lucky";
    $query = mysqli_query($koneksi, "insert into transaksi (nota,id_jenislaundry,qty,kode_konsumen,username) 
    values ('$nota','$id_jenislaundry','$qty','$kode_konsumen','$username')");
        echo "<script>window.location = '?page=transaksi/index';</script>";
    }
    if(isset($_POST['selesai'])) { 
        $query = mysqli_query($koneksi, "update transaksi set status = '1'");
        echo "<script>window.location = '?page=transaksi/index';</script>";

    }
?>