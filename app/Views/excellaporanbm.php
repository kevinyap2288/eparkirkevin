<!DOCTYPE html>
<html>
<head>
  <title>Data barang masuk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<td><img src="<?= base_url('img/logo_sph.png');?>" width="250px"></td>
  <h1>Gudang Sekolah Permata Harapan</h1> 
  <h2>Laporan Barang Masuk</h2>           
  <table class="table table-bordered"  id="my-table">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>Id barang </th>
        <th>Tanggal masuk</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
       <tbody>
      <?php 
      $ms=1;
      foreach ($lol1 as $key => $value) {
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_barang?></td>
        <td><?= $value->tanggal_masuk?></td>
        <td><?= $value->jumlah?></td>
      </tr>
<?php  
}
?>
    </tbody>
  </table>
<script>
    window.onload = () => {
        const table = document.getElementById('my-table');
        exportTable(table, 'laporan_barang_masuk.xls');
    };

    function exportTable(table, filename) {
        const tableHTML = encodeURIComponent(table.outerHTML);
        const downloadLink = document.createElement('a');

        downloadLink.href = `data:application/vnd.ms-excel,${tableHTML}`;
        downloadLink.download = filename;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
        window.close();
    }
</script>
</tbody>
</table>
</div>
</body>
</html>