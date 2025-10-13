<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a nuestra app</title>
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            background: #ffffff;
            margin: 40px auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .content {
            padding: 30px;
            color: #333;
            line-height: 1.6;
        }

        .content p {
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white !important;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            {{-- ¡Bienvenido a {{ config('app.name') }}! --}}
            Otp generada
        </div>

        <div class="content">
            <p>Hola <strong>{{ $name }}</strong>,</p>
            <p>Nos alegra que estés probando el sistema de correos con Laravel .</p>
            <p>Este es un ejemplo de correo enviado desde <strong>Mailtrap</strong> usando tu aplicación Laravel.</p>

            tu otp es: <strong>wazaa</strong>
            
            {{-- <a href="#" class="btn">Explorar más</a> --}}
        </div>

        <div class="footer">
            © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.<br>
            Este correo fue enviado automáticamente. No respondas a este mensaje.
        </div>
    </div>
</body>
</html>
