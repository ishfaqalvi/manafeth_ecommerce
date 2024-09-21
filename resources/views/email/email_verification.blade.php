<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            background-color: #e0e0e0; /* Light grey background for contrast */
            margin: 0;
            padding: 0;
        }
        .logo {
            text-align: center;
            padding: 20px 0;
        }
        .logo img {
            max-width: 250px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 40px auto; /* Adds some vertical spacing for better visibility */
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* More prominent shadow */
            border-radius: 8px;
            border: 1px solid #ddd; /* Soft border to make it stand out */
        }
        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #F2A82B;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            color: #ffffff;
            font-size: 22px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .content p {
            color: #555555;
            line-height: 1.6;
            font-size: 14px;
        }
        .otp {
            font-size: 22px;
            font-weight: bold;
            color: #F2A82B;
            margin: 20px 0;
            background-color: #f4f4f4;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            font-size: 12px;
            background-color: #F2A82B;
            color: #ffffff;
            border-radius: 0 0 8px 8px;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ settings('website_logo') }}" alt="{{ settings('website_name') }}">
    </div>

    <div class="container">
        <div class="header">
            <h1>Email Verification</h1>
        </div>

        <div class="content">
            <p>Dear User,</p>
            <p>Thank you for choosing our service. Use the OTP below to verify your email address. This OTP is valid for 5 minutes:</p>
            <div class="otp">{{ $otp }}</div>
            <p>If you did not request this, please ignore this email.</p>
            <p>Thank you,<br>{{ settings('website_name') }} Team</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y').' '.settings('website_name') }}. All rights reserved.</p>
            <p>{{ settings('website_address') }}</p>
        </div>
    </div>
</body>
</html>
