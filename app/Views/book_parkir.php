<style>
    .parking-map {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 15px;
        justify-content: center;
        padding: 20px;
        background: #e9ecef;
        border-radius: 10px;
    }

    .parking-space {
        width: 90px;
        height: 140px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .available {
        background: #28a745;
        color: white;
    }

    .available:hover {
        background: #218838;
    }

    .booked {
        background: #dc3545;
        color: white;
        cursor: not-allowed;
    }

    .lane {
        background: #6c757d;
        height: 50px;
        grid-column: span 5;
        text-align: center;
        color: white;
        line-height: 50px;
        font-weight: bold;
        border-radius: 5px;
    }
</style>

<div class="page-wrapper bg-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h2>Parking Map</h2>
                        <p>Click on an available parking space to book it.</p>

                        <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success"><?= session('success') ?></div>
                        <?php endif; ?>

                        <?php if (session()->has('error')) : ?>
                            <div class="alert alert-danger"><?= session('error') ?></div>
                        <?php endif; ?>

                        <div class="parking-map">
                            <?php if (!empty($spaces)) : ?>
                                <?php $count = 0; $columns = 5; ?>

                                <?php foreach ($spaces as $space) : ?>
                                    <?php if ($count % $columns === 0 && $count !== 0) : ?>
                                        <div class="lane">Lane</div>
                                    <?php endif; ?>

                                    <div class="parking-space <?= $space['status'] === 'booked' ? 'booked' : 'available' ?>"
                                         data-id="<?= $space['id_parkir'] ?>">
                                        <?= $space['lokasi'] ?>
                                    </div>

                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No parking spaces available at the moment.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="welcome-header">
                    <div class="row">
                        <div class="col-xl-10 col-lg-5 col-md-5 d-flex align-items-center">
                            <div class="wel-come-name">
                                <h4><span><?= session()->get('user') ?></span>Choose your parking spot before it's fully booked!</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="bookingModalLabel">Book Parking Spot</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url('home/bookParking') ?>" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="id_user" value="<?= session()->get('id') ?>">
                     <input type="hidden" name="id_parkir" id="id_parkir">

                     <div class="mb-3">
                         <label for="kendaraan" class="form-label">Vehicle Type:</label>
                         <select name="kendaraan" id="kendaraan" class="form-select" required>
                             <option value="Mobil">Car</option>
                         </select>
                     </div>

                     <div class="mb-3">
                         <label for="awal_waktu_reservasi" class="form-label">Start Time:</label>
                         <input type="datetime-local" name="awal_waktu_reservasi" id="awal_waktu_reservasi" class="form-control" required>
                     </div>

                     <div class="mb-3">
                         <label for="akhir_waktu_reservasi" class="form-label">End Time:</label>
                         <input type="datetime-local" name="akhir_waktu_reservasi" id="akhir_waktu_reservasi" class="form-control" required>
                     </div>

                     <div class="mb-3">
                         <label for="total_tagihan" class="form-label">Total Charge:</label>
                         <input type="text" id="total_tagihan_display" class="form-control" readonly>
                         <input type="hidden" name="total_tagihan" id="total_tagihan">
                     </div>
                     <div class="mb-3">
    <label class="form-label">Payment Method:</label>
    <div class="d-flex flex-wrap gap-3">
        <label class="payment-option">
            <input type="radio" name="metode_pembayaran" value="Ovo" required onclick="showPaymentInfo('ovo-info')">
            <img src="<?=base_url('assets/img/ovo.png') ?>" alt="Ovo" style="width: 50px; height: 50px; object-fit: contain;">
        </label>
        <label class="payment-option">
            <input type="radio" name="metode_pembayaran" value="Dana" required onclick="showPaymentInfo('dana-info')">
            <img src="<?=base_url('assets/img/dana.png') ?>" alt="Dana" style="width: 50px; height: 50px; object-fit: contain;">
        </label>
        <label class="payment-option">
            <input type="radio" name="metode_pembayaran" value="Gopay" required onclick="showPaymentInfo('gopay-info')">
            <img src="<?=base_url('assets/img/gopay.png') ?>" alt="Gopay" style="width: 50px; height: 50px; object-fit: contain;">
        </label>
    </div>
</div>

<div id="payment-info" style="margin-top: 10px;">
    <div id="dana-info" style="display: none;">
        <p>Silakan lakukan pembayaran ke nomor dana berikut:</p>
        <strong>0821-7063-9694</strong><br>
        Atas Nama: <strong></strong>
    </div>
    <div id="gopay-info" style="display: none;">
        <p>Silakan lakukan pembayaran ke nomor Gopay berikut:</p>
        <strong>0821-7063-9694</strong><br>
        Atas Nama: <strong></strong>
    </div>
    <div id="ovo-info" style="display: none;">
        <p>Silakan lakukan pembayaran ke nomor Ovo berikut:</p>
        <strong>0821-7063-9694</strong><br>
        Atas Nama: <strong></strong>
    </div>
</div>

<script>
    function showPaymentInfo(infoId) {
        document.getElementById('dana-info').style.display = 'none';
        document.getElementById('gopay-info').style.display = 'none';
        document.getElementById('ovo-info').style.display = 'none';
        
        document.getElementById(infoId).style.display = 'block';
    }
</script>

                        <p id="info_pembayaran" class="mt-2 text-muted"></p>
                    </div>
                     <div class="mb-3">
                         <label for="bukti_pembayaran" class="form-label">Upload Payment Proof:</label>
                         <input type="file" name="bukti_pembayaran" class="form-control" required>
                     </div>

                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                         <button type="submit" class="btn btn-primary">Confirm Booking</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener("click", function (event) {
        let space = event.target.closest(".parking-space.available");
        if (space) {
            document.getElementById("id_parkir").value = space.getAttribute("data-id");
            let bookingModal = new bootstrap.Modal(document.getElementById("bookingModal"));
            bookingModal.show();
        }
    });

    function calculateTotal() {
        let vehicleType = document.getElementById("kendaraan").value;
        let startTime = document.getElementById("awal_waktu_reservasi").value;
        let endTime = document.getElementById("akhir_waktu_reservasi").value;

        if (!startTime || !endTime) return;

        let rate = vehicleType === "Mobil" ? 5000 : 2000;
        let start = new Date(startTime);
        let end = new Date(endTime);
        let diffHours = Math.ceil((end - start) / (1000 * 60 * 60));

        if (diffHours > 0) {
            let total = diffHours * rate;
            document.getElementById("total_tagihan").value = total;
            document.getElementById("total_tagihan_display").value = "Rp" + total.toLocaleString();
        }
    }

    document.getElementById("kendaraan").addEventListener("change", calculateTotal);
    document.getElementById("awal_waktu_reservasi").addEventListener("change", calculateTotal);
    document.getElementById("akhir_waktu_reservasi").addEventListener("change", calculateTotal);

    document.getElementById("bookingForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData(this);
        fetch("<?= base_url('home/bookParking') ?>", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let bookedSpot = document.querySelector(`.parking-space[data-id='${formData.get("id_parkir")}']`);
                if (bookedSpot) {
                    bookedSpot.classList.remove("available");
                    bookedSpot.classList.add("booked");
                    bookedSpot.classList.remove("cursor-pointer");
                    bookedSpot.textContent = "Booked";
                }
                document.getElementById("bookingModal").querySelector(".btn-close").click();
            } else {
                alert("Booking failed. Please try again.");
            }
        })
        .catch(error => console.error("Error:", error));
    });
});

</script>
