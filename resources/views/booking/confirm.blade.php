<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed</title>
    <style>
        body { font-family: Arial; margin: 0; background: #f0f0f0; }
        header { background: #0b6fa4; color: white; text-align: center; padding: 15px; }
        .box { max-width: 500px; background: white; margin: 30px auto; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; text-align: center; }
        h2 { color: green; }
        .btn { display: inline-block; padding: 12px 25px; background: #0b6fa4; color: white; border-radius: 5px; text-decoration: none; margin-top: 15px; }
        .btn:hover { background: #094f75; }
    </style>
</head>
<body>
<header>
    <h2>🏍️ Dhaka Bike Rent</h2>
</header>

<div class="box">
    <h2>🎉 Congratulations!</h2>
    <p>Your booking is confirmed successfully!</p>
    <p>Please visit our shop with your original NID and Driving License.</p>
    <p><b>Address:</b> Ashulia, Dhaka</p>

    <a href="{{ route('booking.index') }}" class="btn">Book Another Bike</a>
</div>
</body>
</html>