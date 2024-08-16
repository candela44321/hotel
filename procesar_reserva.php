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
$id_cliente = $_POST['id_cliente'];
$fecha_reserva = $_POST['fecha_reserva'];
$fecha_checkin = $_POST['fecha_checkin'];
$fecha_checkout = $_POST['fecha_checkout'];
$tipo_habitacion = $_POST['tipo_habitacion'];
$estado_reserva = $_POST['estado_reserva'];
$num_huespedes = $_POST['num_huespedes'];
$solicitudes_especiales = $_POST['solicitudes_especiales'];
$cant_personas = $_POST['cant_personas'];
$id_metodo_pago = $_POST['id_metodo_pago'];

// SQL para insertar datos
$sql = "INSERT INTO reservas (id_cliente, fecha_reserva, fecha_checkin, fecha_checkout, tipo_habitacion, estado_reserva, num_huespedes, solicitudes_especiales, cant_personas, id_metodo_pago) 
        VALUES ('$id_cliente', '$fecha_reserva', '$fecha_checkin', '$fecha_checkout', '$tipo_habitacion', '$estado_reserva', '$num_huespedes', '$solicitudes_especiales', '$cant_personas', '$id_metodo_pago')";

if ($conn->query($sql) === TRUE) {
    echo "Reserva realizada con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
