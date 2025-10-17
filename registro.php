<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $programa = $_POST['programa'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $ficha = $_POST['ficha'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT); // Encriptar la contraseña
    $rol = $_POST['rol'];

    // Verificar si el correo ya existe
    $check = "SELECT * FROM usuarios WHERE correo='$correo'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "<script>alert('⚠️ El correo ya está registrado.'); window.history.back();</script>";
    } else {
        $sql = "INSERT INTO usuarios (nombres, apellidos, correo, programa, tipo_documento, numero_documento, ficha, clave, rol)
                VALUES ('$nombres', '$apellidos', '$correo', '$programa', '$tipo_documento', '$numero_documento', '$ficha', '$clave', '$rol')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('✅ Registro exitoso.'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('❌ Error al registrar: " . $conn->error . "');</script>";
        }
    }
    $conn->close();
}
?>

