<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <style>
        body { font-family: Arial; margin: 0; background: #f0f0f0; }
        header { background: #0b6fa4; color: white; text-align: center; padding: 15px; }
        .box { max-width: 900px; background: white; margin: 30px auto; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        h2 { color: #0b6fa4; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #0b6fa4; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .status-pending { color: orange; font-weight: bold; }
        .status-approved { color: green; font-weight: bold; }
        .status-rejected { color: red; font-weight: bold; }
        .btn { display: inline-block; padding: 10px 20px; background: #0b6fa4; color: white; border-radius: 5px; text-decoration: none; margin-top: 15px; }
    </style>
</head>
<body>
<header>
    <h2>🏍️ Dhaka Bike Rent</h2>
    <p>Ashulia, Dhaka</p>
</header>

<div class="box">
    <h2>📋 My Bookings</h2>

    @if($bookings->count() > 0)
    <table>
        <tr>
            <th>ID</th>
            <th>Bike</th>
            <th>Hours</th>
            <th>Total Rent</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ explode('=', $booking->bike_name)[0] }}</td>
            <td>{{ $booking->hours }}</td>
            <td>{{ $booking->total_rent }} TK</td>
            <td class="status-{{ $booking->status }}">{{ ucfirst($booking->status) }}</td>
            <td>{{ $booking->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </table>
    @else
        <p>No bookings found!</p>
    @endif

    <a href="{{ route('booking.index') }}" class="btn">🏍️ Book a Bike</a>
</div>
</body>
</html>