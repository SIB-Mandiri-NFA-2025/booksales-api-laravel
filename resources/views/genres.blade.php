<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Genre</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background: linear-gradient(to right, #5d1049, #93329e);
            color: #f0f0f0;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            margin-bottom: 40px;
            font-size: 1.1em;
        }

        .genre-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .genre-card {
            background-color: #fff;
            color: #333;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.2s ease;
            position: relative;
        }

        .genre-card:hover {
            transform: translateY(-5px);
        }

        .genre-badge {
            position: absolute;
            top: -15px;
            left: 20px;
            background-color: #ff6f91;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: white;
            font-weight: bold;
        }

        .genre-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .genre-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .genre-description {
            font-size: 0.95rem;
            line-height: 1.4;
        }
    </style>
</head>
<body>
    <h1>Daftar Genre</h1>
    <p>Selamat datang di halaman daftar genre.</p>

    <div class="genre-list">
        @foreach ($genres as $genre)
            <div class="genre-card">
                <div class="genre-badge">ID: {{ $genre['id'] }}</div>
                <div class="genre-icon">
                    @php
                        $emojis = ['📖', '🧠', '🎌', '🧙‍♂️', '🎭'];
                        $emoji = $emojis[($genre['id'] - 1) % count($emojis)];
                    @endphp
                    {{ $emoji }}
                </div>
                <div class="genre-title">{{ $genre['name'] }}</div>
                <div class="genre-description">{{ $genre['description'] }}</div>
            </div>
        @endforeach
    </div>
</body>
</html>
