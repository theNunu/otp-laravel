{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Correo Electrónico</title>
    <style>
        /* Estilos Generales */
        body {
            background-color: #e9ecef;
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* Encabezado */
        .header {
            background: #0b2a4a; /* Fondo azul oscuro, por si la imagen es transparente */
            text-align: center;
            padding: 0; /* No necesitamos padding si la imagen lo tiene */
        }

        .header img {
            width: 100%; /* La imagen debe ocupar todo el ancho del contenedor */
            max-width: 600px; /* Asegura que no sea más grande que el contenedor principal */
            height: auto;
            display: block; /* Elimina espacios extra debajo de la imagen */
        }
        

        .header h1 { /* Si decides usar un h1 para "OTP GENERADA" */
            margin: 0;
            font-size: 20px;
            letter-spacing: 1px;
            padding-bottom: 20px; /* Añade padding inferior al h1 para el espacio final del header */
        }

        /* Contenido principal */
        .content {
            padding: 30px;
            color: #333;
            text-align: center;
            line-height: 1.6;
        }

        .content p {
            margin: 10px 0;
        }

        .otp {
            display: inline-block;
            background: #001f3f;
            color: white;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 2px;
            padding: 10px 20px;
            border-radius: 6px;
            margin-top: 10px;
        }

        /* Pie de página */
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
            <img src="{{ $message->embed(public_path('images/logo_fef.png')) }}" alt="Logo FEF">
        </div>

        <div class="content">
            <p>Querido, <strong>{{ $name }}</strong></p>
            <p>Fue enviado el OTP al correo: aarreaga@gmail.com</p>
            <p>Tu OTP es:</p>

            <div class="otp">{{ $mi_otp }}</div>

            <p style="margin-top:15px;">Está disponible hasta: <strong>{{ $expires_at }}</strong></p>
        </div>

        <div class="footer">
            Este correo fue enviado automáticamente. No responder este mensaje.
        </div>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #f5f6fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .header {
            display: flex;
            padding: 25px 20px;
        }

        .header img {
            width: 110px;
            height: auto;

        }

        .header h1 {
            font-size: 20px;
            color: #a50064;
            /* color institucional tipo Banco Guayaquil */
            margin: 0;
            font-weight: bold;
        }

        .message {
            text-align: left;
            padding: 30px 40px;
        }

        .message h2 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            
        }

        .message p {
            font-size: 14px;
            color: #555;
            margin: 8px 0;
        }

        .details-box {
            background-color: #f3f5f9;
            border-radius: 8px;
            padding: 40px;
            margin-top: 20px;
        }

        .details-box p {
            margin: 5px 0;
            font-size: 14px;
            color: #444;
        }

        .footer {
            background-color: #fafafa;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
            border-top: 1px solid #eee;
        }

        .container-main {
            padding: 10px;
            background-color: #f3f5f9;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-main">
        <div class="header">
            {{-- <img src="images/fef.png" alt="Logo Banco"> --}}
            <img src="{{ $message->embed(public_path('images/fef.png')) }}" alt="Logo FEF">
        </div>
        <div class="container">


            <div class="message">
                <h2>OTP generada</h2>
                {{-- <p>Te detallamos tu ingreso:</p> --}}
                <p>Querido, <strong>{{ $name }}</strong></p>

                <div class="details-box">
                    <p>Fue enviado el OTP al correo: aarreaga@gmail.com</p>
                    <p>Tu OTP es: <strong>{{ $mi_otp }}</strong></p>
                    {{-- <p><strong>Fecha:</strong> 22/10/2025 23:40</p>
                    <p><strong>Dirección de máquina:</strong> 191.99.35.246</p> --}}
                    <p style="margin-top:15px;">Está disponible hasta: <strong>{{ $expires_at }}</strong></p>
                    {{-- <div class="otp">{{ $mi_otp }}</div> --}}

                </div>

                 


            

            

                <p style="margin-top: 25px; font-size: 13px; color: #666;">
                    Esta informacion es confidencial  no la compartas con nadie.
                </p>
            </div>

            <div class="footer">
                © 2025 Banco Azul — No responder a este correo. 
            </div>
        </div>

    </div>

</body>

</html>