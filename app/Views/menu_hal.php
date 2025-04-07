<?php

// Ambil data pengaturan dari database

$db = db_connect();

$pengaturan = $db->table('pengaturan_app')->get()->getRow();

?>
<!-- Start Navbar Area -->
   <div id="google_translate_element"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id',
            includedLanguages: 'en,id',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <div class="navbar-area">
            <!-- Menu For Mobile Device -->
             <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="<?=base_url('assets/img/logo.png')?>" class="logo-one" alt="Logo">
                    <img src="<?=base_url('assets/img/sticky-logo.png')?>" class="logo-two" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav top-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <?php if ($pengaturan->logo && file_exists(FCPATH . 'uploads/' . $pengaturan->logo)): ?>
                        <img src="<?= base_url('uploads/' . $pengaturan->logo) ?>" alt="Logo" width="100">
                        <?php else: ?>
                        <img src="<?= base_url('img/default-logo.png') ?>" alt="Default Logo" width="100">
                        <?php endif; ?>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="<?=base_url('/home/dashboard')?>" class="nav-link">
                                        Home
                                    </a>
                                </li>
                        <?php if (session()->has('level') && in_array(session()->get('level'), [0, 1])): ?>
                        <li class="nav-item">
                        <a href="#" class="nav-link active">
                            Tables
                        <i class='bx bxs-chevron-right'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="<?=base_url('home/user')?>" class="nav-link">
                                    User
                                </a>
                            </li>
                            <?php if (session()->get('level') == 0): // Hanya untuk level 0 ?>
                                <li class="nav-item">
                                    <a href="<?=base_url('home/restoreuser')?>" class="nav-link">
                                        Restore User
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        Booking
                                        <i class='bx bxs-chevron-right'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?=base_url('home/showParkingMap')?>" class="nav-link">
                                                Cars
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?=base_url('home/showParkingMapMotor')?>" class="nav-link">
                                                Motorcycle
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        History
                                        <i class='bx bxs-chevron-right'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?=base_url('home/showParkingHistory')?>" class="nav-link">
                                                Parking
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?=base_url('home/showPaymentHistory')?>" class="nav-link">
                                                Payment
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('home/viewLog')?>" class="nav-link">
                                        Logs
                                    </a>
                                </li>
                                <?php if (session()->has('level') && in_array(session()->get('level'), [0, 1])): ?>
                                <li class="nav-item">
                                    <a href="<?=base_url('home/cctv')?>" class="nav-link">
                                        Cameras
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('home/pengaturan')?>" class="nav-link">
                                        Setting
                                    </a>
                                </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <form action="/home/logout" method="post">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to log out?');">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->