<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body { font-family: Arial; margin: 0; background: #f0f0f0; }
        header { background: #0b6fa4; color: white; text-align: center; padding: 15px; }
        .box { max-width: 900px; background: white; margin: 30px auto; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        h2 { color: #0b6fa4; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #0b6fa4; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .btn-delete { background: red; color: white; border: none; padding: 6px 12px; border-radius: 5px; cursor: pointer; }
        .btn-logout { background: red; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; margin-top: 15px; }
        .stats { background: #e8f4f8; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>
<header>
    <h2>🔧 Admin Dashboard - Dhaka Bike Rent</h2>
</header>

<div class="box">
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <div class="stats">
        <h3>📊 Total Users: {{ $totalUsers }}</h3>
        <h3>📋 Total Bookings: {{ $bookings->count() }}</h3>
    </div>

    <h2>All Bookings</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Bike</th>
            <th>Hours</th>
            <th>Total Rent</th>
            <th>Status</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->user->name ?? 'N/A' }}</td>
            <td>{{ explode('=', $booking->bike_name)[0] }}</td>
            <td>{{ $booking->hours }}</td>
            <td>{{ $booking->total_rent }} TK</td>
            <td>{{ $booking->status }}</td>
            <td>{{ $booking->created_at->format('d-m-Y') }}</td>
            <td>
                <form action="{{ route('admin.delete', $booking->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete" onclick="return confirm('Delete?')">X</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn-logout">Logout</button>
    </form>
</div>
</body>
</html>