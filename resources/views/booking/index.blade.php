<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rent - Dhaka</title>
    <style>
        body { font-family: Arial; margin: 0; background: #f0f0f0; }
        header { background: #0b6fa4; color: white; text-align: center; padding: 15px; }
        .box { max-width: 500px; background: white; margin: 30px auto; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        h3 { color: #0b6fa4; }
        ul { line-height: 2; }
        select, input { width: 100%; padding: 10px; margin-top: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn { width: 100%; padding: 12px; background: #0b6fa4; color: white; border: none; border-radius: 5px; margin-top: 15px; cursor: pointer; font-size: 16px; }
        .btn:hover { background: #094f75; }
        .logout { background: red; }
    </style>
</head>
<body>
<header>
    <h2>🏍️ Dhaka Bike Rent</h2>
    <p>Ashulia, Dhaka</p>
</header>

<div class="box">
    <h3>📋 Bike Rental Rules</h3>
    <ul>
        <li>NID + Driving License required</li>
        <li>Age must be 18+</li>
        <li>Security Money: 2000 TK</li>
        <li>Outside Dhaka = 10,000 TK Fine</li>
        <li>Damage Fine = 5,000 TK</li>
    </ul>

    <h3>🚲 Book a Bike</h3>

    @if($errors->any())
        <div style="color:red;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Select Bike:</label>
        <select name="bike_name">
            <option value="Standard Bike=200">Standard Bike = 200 TK/hr</option>
            <option value="Scooter=250">Scooter = 250 TK/hr</option>
            <option value="Gear Bike=300">Gear Bike = 300 TK/hr</option>
        </select>

        <label>Hours:</label>
        <input type="number" name="hours" placeholder="Enter hours" min="1" required>

        <label>Upload NID:</label>
        <input type="file" name="nid_file" required>

        <label>Upload Driving License:</label>
        <input type="file" name="dl_file" required>

        <button type="submit" class="btn">Confirm Booking</button>
    </form>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn logout">Logout</button>
    </form>
</div>
</body>
</html>