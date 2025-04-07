
<?php

// Ambil data pengaturan dari database

$db = db_connect();

$pengaturan = $db->table('pengaturan_app')->get()->getRow();

?>
<!doctype html>
<html lang="zxx">

    <head>

        <!-- Required Meta Tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
              
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>"> 
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/owl.theme.default.min.css')?>">
        <link rel="stylesheet" href="<?=base_url('assets/css/owl.carousel.min.css')?>">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/magnific-popup.min.css')?>">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/animate.min.css')?>">
        <!-- Boxicons CSS --> 
        <link rel="stylesheet" href="<?=base_url('assets/css/boxicons.min.css')?>">
        <!-- Flaticon CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/fonts/flaticon.css')?>">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/meanmenu.min.css')?>">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/responsive.css')?>">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/css/theme-dark.css')?>">

        <!-- Title -->
        <title><?= $pengaturan->judul ?? 'Home' ?></title>
        
        <!-- Place favicon.ico in the root directory -->
        <?php if ($pengaturan->logo_web && file_exists(FCPATH . 'uploads/' . $pengaturan->logo_web)): ?>
            <link rel="shortcut icon" href="<?= base_url('uploads/' . $pengaturan->logo_web) ?>" type="image/x-icon">
        <?php else: ?>
            <link rel="shortcut icon" href="<?= base_url('img/default-logo.png') ?>" type="image/x-icon">
        <?php endif; ?>

<!-- Tambahkan logo di atas title -->


        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= base_url($pengaturan->logo ? 'writable/uploads/' . $pengaturan->logo : 'img/luiga.jpeg') ?>" type="image/x-icon">
    </head>
<body>
    <script>
    var timeout = 10 * 60 * 1000; // 15 menit dalam milidetik
    var logoutUrl = "<?= base_url('home/logout') ?>"; // URL logout

    var logoutTimer = setTimeout(logoutUser, timeout);

    function resetTimer() {
        clearTimeout(logoutTimer);
        logoutTimer = setTimeout(logoutUser, timeout);
    }

    function logoutUser() {
        alert("Anda telah logout karena tidak ada aktivitas.");
        window.location.href = logoutUrl;
    }

    // Deteksi aktivitas pengguna
    document.addEventListener("mousemove", resetTimer);
    document.addEventListener("keypress", resetTimer);
    document.addEventListener("scroll", resetTimer);
    document.addEventListener("click", resetTimer);
</script>
