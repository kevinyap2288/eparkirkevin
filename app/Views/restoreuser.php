<main id="main" class="main">
  <div class="pagetitle">
    <h1>Table Pengguna</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pengguna</h5>
            <input type="hidden" name="id_user" value="<?= $value->id_user ?>">
                    <a href="<?= base_url('home/aksirestoreall' . $value->id_user); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Restore All</a>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $ms = 1;
               foreach ($takdirestui as $key => $value) {
                 if ($value->delete_status == 1) { // Hanya tampilkan yang tidak dihapus
                ?>
                <tr>
                  <td><?= $ms++ ?></td>
                  <td><?= $value->nama ?></td>
                  <td>
                    <span style="
                      display: inline-block;
                      padding: 5px 10px;
                      border-radius: 15px;
                      color: white;
                      font-weight: bold;
                      background-color: <?= $value->level == 0 ? 'red' : ($value->level == 1 ? 'green' : ($value->level == 2 ? 'blue' : 'gray')) ?>;">
                      <?= $value->level == 0 ? 'Super Admin' : ($value->level == 1 ? 'Admin' : ($value->level == 2 ? 'Guest' : 'User')) ?>
                    </span>
                  </td>
                  <td>
                    <input type="hidden" name="id_user" value="<?= $value->id_user ?>">
                    <a href="<?= base_url('home/hapusPenggunaril/' . $value->id_user); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                      <i class="fas fa-edit"></i> Hapus
                    </a>
                    <input type="hidden" name="id_user" value="<?= $value->id_user ?>">
                    <a href="<?= base_url('home/aksirestore/' . $value->id_user); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Restore</a>
                  </td>
                </tr>
                <?php
                 }
               }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
