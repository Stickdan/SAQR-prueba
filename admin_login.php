<?php
include("conexion.php");
session_start();

// Configura aquí tu usuario y contraseña únicos de administrador
$admin_correo = "admin@saqr.com";
$admin_clave = "codigoqr123"; // puedes cambiarla, pero recuerda no dejarla en blanco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Verifica si es el administrador
    if ($correo === $admin_correo && $clave === $admin_clave) {
        $_SESSION['rol'] = 'admin';
        $_SESSION['usuario'] = 'Administrador';

        // Redirigir al index y abrir sección "tabla"
        echo "<script>
                alert('✅ Bienvenido Administrador');
                window.location.href = 'index.php?section=tabla';
              </script>";
        exit();
    } else {
        echo "<script>alert('❌ Credenciales incorrectas'); window.history.back();</script>";
    }
}
?>
