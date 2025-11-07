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
                {{-- <p>Querido, <strong>{{ $data['name'] }}</strong></p> --}}
                <div class="details-box">
                    <p>Fue enviado el OTP al correo: <strong>{{ $data['email'] }}</strong></p>
                    <p>Tu OTP es: <strong>{{ $data['otp_code'] }}</strong></p>
                    <p style="margin-top:15px;">Está disponible hasta: <strong>{{ $data['expires_at'] }}</strong></p>
                </div>

                <p style="margin-top: 25px; font-size: 13px; color: #666;">
                    Esta informacion es confidencial  no la compartas con nadie.
                </p>
            </div>

            <div class="footer">
                Este correo fue enviado automáticamente. No responder este mensaje.
            </div>
        </div>

    </div>

</body>

</html>