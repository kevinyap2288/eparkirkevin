<div class="page-wrapper bg-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>Riwayat Pembayaran</h2>

                        <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success"><?= session('success') ?></div>
                        <?php endif; ?>

                        <?php if (session()->has('error')) : ?>
                            <div class="alert alert-danger"><?= session('error') ?></div>
                        <?php endif; ?>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lokasi Parkir</th>
                                    <th>Kendaraan</th>
                                    <th>Awal Reservasi</th>
                                    <th>Akhir Reservasi</th>
                                    <th>Total Tagihan</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status</th>
                                    <th>Bukti Pembayaran</th>
                                    <?php if (session()->get('level') == 1) : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($reservations)) : ?>
                                    <?php $no = 1;
                                    foreach ($reservations as $reservation) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $reservation['lokasi'] ?></td>
                                            <td><?= $reservation['kendaraan'] ?></td>
                                            <td><?= date('d-m-Y H:i', strtotime($reservation['awal_waktu_reservasi'])) ?></td>
                                            <td><?= date('d-m-Y H:i', strtotime($reservation['akhir_waktu_reservasi'])) ?></td>
                                            <td>Rp<?= number_format($reservation['total_tagihan'], 0, ',', '.') ?></td>
                                            <td>
                                                <?php
                                                $metodePembayaran = strtolower($reservation['metode_pembayaran']);
                                                $badgeClass = '';

                                                switch ($metodePembayaran) {
                                                    case 'ovo':
                                                        $badgeClass = 'bg-purple';
                                                        break;
                                                    case 'dana':
                                                        $badgeClass = 'bg-primary';
                                                        break;
                                                    case 'bank transfer':
                                                        $badgeClass = 'bg-dark';
                                                        break;
                                                    case 'gopay':
                                                        $badgeClass = 'bg-info';
                                                        break;
                                                    default:
                                                        $badgeClass = 'bg-secondary';
                                                        break;
                                                }
                                                ?>
                                                <span class="badge <?= $badgeClass; ?>"><?= ucfirst($reservation['metode_pembayaran']); ?></span>
                                            </td>
                                            <td>
                                                <span class="badge 
                                                    <?= ($reservation['status'] == 'Terbayar') ? 'bg-warning' : (($reservation['status'] == 'Terkonfirmasi') ? 'bg-info' : 'bg-success') ?>">
                                                    <?= $reservation['status'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if (!empty($reservation['bukti_pembayaran'])) : ?>
                                                    <a href="<?= base_url($reservation['bukti_pembayaran']) ?>" target="_blank" class="btn btn-primary btn-sm">Lihat</a>
                                                <?php else : ?>
                                                    <span class="text-danger">Tidak Ada</span>
                                                <?php endif; ?>
                                            </td>

                                            <?php if (session()->get('level') == 1) : ?>
                                                <td>
                                                    <?php if ($reservation['status'] != 'Selesai') : ?>
                                                        <a href="<?= base_url('home/updateStatusReservasi/' . $reservation['id_reservasi']) ?>" class="btn btn-success btn-sm">
                                                            Update Status
                                                        </a>
                                                    <?php else : ?>
                                                        <span class="text-muted">Selesai</span>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="<?= (session()->get('level') == 1) ? '9' : '8' ?>" class="text-center">Belum ada riwayat reservasi</td>
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