<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Approved</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f7f7f7; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px;">
        <h2 style="color: #28a745;">🎉 Your Order Has Been Approved!</h2>
        <p>Dear {{ $order->name }},</p>
        <p>We’re excited to let you know that your order (ID: <strong>#{{ $order->id }}</strong>) has been <strong>approved</strong>.</p>
        <p>Our vendor will contact you soon regarding delivery and next steps.</p>
        <hr>
        <p style="font-size: 14px; color: #888;">Thank you for choosing us!</p>
    </div>
</body>
</html>
