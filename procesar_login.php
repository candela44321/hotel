<?php
// Configuración de la base de datos
$servername = "localhost";  // Cambia a tu servidor de base de datos
$username = "root";   // Cambia a tu nombre de usuario de base de datos
$password = ""; // Cambia a tu contraseña de base de datos
$dbname = "hotel_gggu"; // Cambia al nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Preparar y ejecutar la consulta
$sql = $conn->prepare("SELECT password, role FROM usuarios WHERE username = ?");
$sql->bind_param("s", $username);
$sql->execute();
$sql->store_result();
$sql->bind_result($hashed_password, $role);
$sql->fetch();

if ($sql->num_rows > 0) {
    // Verificar contraseña
    if (password_verify($password, $hashed_password)) {
        // Redirigir según el rol del usuario
        if ($role === 'admin') {
            header("Location: admin_inicio.html");
        } elseif ($role === 'cliente') {
            header("Location: inicio.html");
        }
        exit;
    } else {
        header("Location: login.html?error=1");
        exit;
    }
} else {
    header("Location: login.html?error=1");
    exit;
}

// Cerrar la conexión
$conn->close();
?>
