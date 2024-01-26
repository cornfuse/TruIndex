<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #333333;
            margin-bottom: 15px;
        }

        h3 {
            font-size: 20px;
            color: #007BFF;
            margin-bottom: 10px;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 20px 0;
            text-align: center;
        }

        .footer p {
            font-size: 14px;
            color: #777777;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Hi {{ $mailData['email'] }},</h2>
    <p>Please use the following One-Time Password (OTP) to reset your password:</p>
    <h3>OTP: {{ $mailData['token'] }}</h3>
    <p>Please note that this OTP can only be used once and is valid for a limited time.</p>
    <p>If you did not attempt to reset your password, please ignore this email.</p>
</div>
<div class="footer">
    <p>Regards,<br> {{ config('app.name') }}</p>
</div>
</body>
</html>
