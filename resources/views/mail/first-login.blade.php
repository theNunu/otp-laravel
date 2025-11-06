<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>¡Bienvenido!</title>
</head>
<body>
    <h2>¡Felicidades {{ $name }} 🎉!</h2>
    <p>Te has logueado por primera vez en nuestro sistema.</p>
    <p>Tu código de bienvenida es: <strong>{{ $mi_otp }}</strong></p>
    <p>Este código expirará a las <strong>{{ $expires_at }}</strong>.</p>
</body>
</html>
