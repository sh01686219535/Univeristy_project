<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Cancelled</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f7f7f7; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px;">
        <h2 style="color: #dc3545;">❌ Your Order Has Been Cancelled</h2>
        <p>Dear {{ $order->name }},</p>
        <p>We regret to inform you that your order (ID: <strong>#{{ $order->id }}</strong>) has been <strong>cancelled</strong>.</p>
        <p>If you believe this is a mistake, please contact our support team for assistance.</p>
        <hr>
        <p style="font-size: 14px; color: #888;">We hope to serve you again in the future.</p>
    </div>
</body>
</html>
