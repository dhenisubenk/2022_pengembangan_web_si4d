<?php  
    if (empty($_SESSION['si4d_web'])) {
        echo "<script>
            alert('Anda belum login');
            window.location.href = 'login.php';
        </script>";
        exit();
    }
