<div class="page-wrapper bg-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <!-- Pop-up Notifikasi -->
                        <!-- <div id="popup" class="popup-container">
                            <div class="popup-box">
                                <h3>Peringatan Parkir!</h3>
                                <p id="popup-message">Waktu parkir telah habis, denda telah diberlakukan.</p>
                                <button class="popup-close" onclick="closePopup()">Tutup</button>
                            </div>
                        </div> -->
                        <!-- Pop-up Notifikasi -->
                        <div id="popup" class="popup-container">
                            <div class="popup-box">
                                <h3>Peringatan Parkir!</h3>
                                <p id="popup-message">Waktu parkir telah habis, denda telah diberlakukan.</p>
                                <button class="popup-close" onclick="closePopup()">Tutup</button>
                            </div>
                        </div>

                        <h2>Riwayat Parkir</h2>
                        <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success"><?= session('success') ?></div>
                        <?php endif; ?>

                        <?php if (session()->has('error')) : ?>
                            <div class="alert alert-danger"><?= session('error') ?></div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Detail Parkir</th>
                                        <th>Tagihan & Pembayaran</th>
                                        <th>Checkout & Denda</th>
                                        <th>Status</th>
                                        <th>Bukti</th>
                                        <?php if (session()->get('level') == 1 || session()->get('level') == 0) : ?>
                                            <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $currentTime = date('Y-m-d H:i:s');
                                    $lateReservations = [];
                                    if (!empty($reservations)) : ?>
                                        <?php $no = 1;
                                        foreach ($reservations as $reservation) : ?>
                                            <tr>
                                                <td class="text-center small"><?= $no++ ?></td>

                                                <!-- Detail Parkir -->
                                                <td>
                                                    <strong><?= $reservation['lokasi'] ?></strong><br>
                                                    <small class="text-muted"><?= ucfirst($reservation['kendaraan']) ?></small><br>
                                                    <small>
                                                        <?= date('D, d M Y H:i', strtotime($reservation['awal_waktu_reservasi'])) ?>
                                                        →
                                                        <?= date('D, d M Y H:i', strtotime($reservation['akhir_waktu_reservasi'])) ?>
                                                    </small><br>

                                                    <?php
                                                    if ($reservation['akhir_waktu_reservasi'] < $currentTime && $reservation['status'] != 'Checkout') :
                                                        $lateReservations[] = $reservation['tiket'];
                                                    ?>
                                                        <span class="badge bg-danger mt-1">Mungkin Terlambat</span>
                                                    <?php endif; ?>

                                                </td>


                                                <!-- Tagihan & Pembayaran -->
                                                <td class="text-center">
                                                    <small>Rp<?= number_format($reservation['total_tagihan'], 0, ',', '.') ?></small><br>
                                                    <span class="badge 
                                                        <?= strtolower($reservation['metode_pembayaran']) == 'ovo' ? 'bg-purple' : (strtolower($reservation['metode_pembayaran']) == 'dana' ? 'bg-primary' : (strtolower($reservation['metode_pembayaran']) == 'bank transfer' ? 'bg-dark' : (strtolower($reservation['metode_pembayaran']) == 'gopay' ? 'bg-info' : 'bg-secondary'))) ?>"
                                                        data-bs-toggle="tooltip" title="Metode: <?= ucfirst($reservation['metode_pembayaran']) ?>">
                                                        <?= ucfirst($reservation['metode_pembayaran']) ?>
                                                    </span>
                                                </td>

                                                <!-- Checkout & Denda -->
                                                <td class="text-center">
                                                    <!-- <small><?= $reservation['waktu_checkout'] ? date('d-m-Y H:i', strtotime($reservation['waktu_checkout'])) : '-' ?></small><br> -->
                                                    <small class="text-danger">
                                                        Rp<?= number_format($reservation['total_denda'], 0, ',', '.') ?>
                                                    </small><br>

                                                    <?php if ($reservation['status'] == 'Menunggu Bukti Denda') : ?>
                                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#bayarDendaModal<?= $reservation['id_reservasi'] ?>">
                                                            Bayar Denda
                                                        </button>

                                                        <!-- Modal Form Pembayaran Denda -->
                                                        <div class="modal fade" id="bayarDendaModal<?= $reservation['id_reservasi'] ?>" tabindex="-1" aria-labelledby="bayarDendaLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="bayarDendaLabel">Bayar Denda</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?= base_url('home/bayarDenda/' . $reservation['id_reservasi']) ?>" method="post" enctype="multipart/form-data">
                                                                            <?= csrf_field() ?>

                                                                            <div class="mb-3">
                                                                                <label class="form-label">Total Denda:</label>
                                                                                <input type="text" class="form-control" value="Rp15.000" readonly>
                                                                                <input type="hidden" name="total_denda" value="15000">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="form-label">Metode Pembayaran:</label>
                                                                                <select name="metode_pembayaran_denda" class="form-select" required>
                                                                                    <option value="Ovo">Ovo</option>
                                                                                    <option value="Dana">Dana</option>
                                                                                    <option value="Gopay">Gopay</option>
                                                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="form-label">Upload Bukti Pembayaran:</label>
                                                                                <input type="file" name="bukti_pembayaran_denda" class="form-control" accept="image/*" required>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                                <button type="submit" class="btn btn-success">Bayar Denda</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <span class="badge 
            <?= strtolower($reservation['metode_pembayaran_denda']) == 'ovo' ? 'bg-purple' : (strtolower($reservation['metode_pembayaran_denda']) == 'dana' ? 'bg-primary' : (strtolower($reservation['metode_pembayaran_denda']) == 'bank transfer' ? 'bg-dark' : (strtolower($reservation['metode_pembayaran_denda']) == 'gopay' ? 'bg-info' : 'bg-secondary'))) ?>"
                                                            data-bs-toggle="tooltip" title="Denda via: <?= ucfirst($reservation['metode_pembayaran_denda']) ?>">
                                                            <?= ucfirst($reservation['metode_pembayaran_denda']) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </td>


                                                <!-- Status -->
                                                <td class="text-center">
                                                    <span class="badge 
                                                        <?= ($reservation['status'] == 'Terbayar') ? 'bg-warning' : (($reservation['status'] == 'Terkonfirmasi') ? 'bg-info' : 'bg-success') ?>"
                                                        data-bs-toggle="tooltip" title="Status: <?= ucfirst($reservation['status']) ?>">
                                                        <?= $reservation['status'] ?>
                                                    </span>
                                                </td>

                                                <!-- Bukti Pembayaran -->
                                                <td class="text-center">
                                                    <?php if (!empty($reservation['bukti_pembayaran'])) : ?>
                                                        <a href="<?= base_url($reservation['bukti_pembayaran']) ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                                                    <?php else : ?>
                                                        <small class="text-danger">Tidak Ada</small>
                                                    <?php endif; ?>
                                                </td>

                                                <!-- Aksi -->
                                                <?php if (session()->get('level') == 1 || session()->get('level') == 0) : ?>
                                                    <td class="text-center">
                                                        <?php if ($reservation['status'] == 'Terbayar') : ?>
                                                            <a href="<?= base_url('home/updateStatusReservasi/' . $reservation['id_reservasi']) ?>" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-check"></i> Konfirmasi Pembayaran
                                                            </a>
                                                        <?php elseif ($reservation['status'] == 'Terkonfirmasi') : ?>
                                                            <a href="<?= base_url('home/updateStatusReservasi/' . $reservation['id_reservasi']) ?>" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-door-open"></i> Checkin
                                                            </a>
                                                        <?php elseif ($reservation['status'] == 'Checkin') : ?>
                                                            <a href="<?= base_url('home/updateStatusReservasi/' . $reservation['id_reservasi']) ?>" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-door-closed"></i> Checkout
                                                            </a>
                                                        <?php elseif ($reservation['status'] == 'Menunggu Bukti Denda') : ?>
                                                            <small class="text-muted">Silahkan upload bukti denda</small>
                                                        <?php elseif ($reservation['status'] == 'Checkout') : ?>
                                                            <small class="text-muted">Selesai</small>
                                                        <?php else : ?>
                                                            <small class="text-muted">Selesai</small>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>

                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="<?= (session()->get('level') == 1) ? '7' : ((session()->get('level') == 0) ? '5' : '6') ?>" class="text-center">
                                                <small>Belum ada riwayat reservasi</small>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function checkLateParking() {
        $.ajax({
            url: "<?= base_url('parking/checkLateReservations') ?>",
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.length > 0) {
                    let message = "Waktu Parkir dengan nomor tiket: " + response.map(r => r.tiket).join(", ") + " telah habis. Denda sudah diberlakukan!";

                    document.getElementById("popup-message").innerText = message;

                    document.getElementById("popup").classList.add("show");
                }
            },
            error: function() {
                console.log("Gagal mengambil data parkir.");
            }
        });
    }

    setInterval(checkLateParking, 10000);

    function closePopup() {
        document.getElementById("popup").classList.remove("show");
    }
</script>

<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        let lateReservations = <?= json_encode($lateReservations) ?>;
        if (lateReservations.length > 0) {
            let message = "Waktu Parkir dengan nomor tiket: " + lateReservations.join(", ") + " telah habis. Denda sudah diberlakukan!";

            document.getElementById("popup-message").innerText = message;

            document.getElementById("popup").classList.add("show");
        }
    });

    function closePopup() {
        document.getElementById("popup").classList.remove("show");
    }
</script> -->