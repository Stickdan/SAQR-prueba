<?php
include("conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($clave, $usuario['clave'])) {
            $_SESSION['usuario'] = $usuario['nombres'];
            $_SESSION['rol'] = $usuario['rol'];

            // ✅ Redirección según el rol
            if ($usuario['rol'] === 'admin') {
                echo "<script>
                        alert('👑 Bienvenido administrador, {$usuario['nombres']}!');
                        window.location.href = 'index.php?section=tabla';
                      </script>";
            } else {
                echo "<script>
                        alert('Bienvenido, {$usuario['nombres']}!');
                        window.location.href = 'index.php?section=qr';
                      </script>";
            }

        } else {
            echo "<script>alert('❌ Contraseña incorrecta'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('⚠️ Correo no registrado'); window.history.back();</script>";
    }

    $conn->close();
}
?>
