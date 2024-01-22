<!DOCTYPE html>

<head>
    <title>Welcome to {{ config('app.name') }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td style="padding: 20px 0; text-align: center; background-color: #ffffff;">
            <h2 style="font-size: 24px; margin-bottom: 10px;">Hi {{ $mailData['email'] }},</h2>
            <p style="font-size: 16px; color: #333333;">Thank you for registering with our service. Please use the following One-Time Password (OTP) to verify your email address and complete your account setup:</p>
            <h3 style="font-size: 20px; color: #007BFF;">OTP: {{ $mailData['token'] }}</h3>
            <p style="font-size: 16px; color: #333333;">Please note that this OTP can only be used once and is valid for a limited time.</p>
            <p style="font-size: 16px; color: #333333;">If you did not attempt to register with our service, please ignore this email.</p>
        </td>
    </tr>
    <tr>
        <td style="background-color: #f4f4f4; padding: 20px 0; text-align: center;">
            <p style="font-size: 14px; color: #777777;">Regards,<br>{{ config('app.name') }}</p>
        </td>
    </tr>
</table>

</body>

