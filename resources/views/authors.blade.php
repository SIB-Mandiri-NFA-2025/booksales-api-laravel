<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Author</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #2c3e50;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #f4f4f4;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: #f4f4f4;
            margin-bottom: 40px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .info {
            text-align: center;
        }

        .info strong {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        .info .bio {
            font-size: 0.95rem;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h1>Daftar Author</h1>
    <p>Selamat datang di halaman daftar penulis kami yang hebat.</p>

    <div class="grid-container">
        @foreach ($authors as $author)
            <div class="card">
                <img src="{{ $author['photo'] }}" alt="Foto {{ $author['name'] }}" class="profile-img">
                <div class="info">
                    <strong>ID:</strong> {{ $author['id'] }}
                    <strong>Nama:</strong> {{ $author['name'] }}
                    <strong>Bio:</strong>
                    <div class="bio">{{ $author['bio'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
