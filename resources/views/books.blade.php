<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background: linear-gradient(to right, rgb(93, 16, 44), rgb(158, 50, 64));
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

        .book-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .book-card {
            background-color: #fff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: box-shadow 0.2s ease;
        }

        .book-card:hover {
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .book-cover {
            width: 100px;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .book-info {
            flex-grow: 1;
        }

        .book-info h3 {
            margin: 0;
            color: #2c3e50;
        }

        .book-info p {
            margin: 5px 0;
            font-size: 0.95rem;
            color: #444;
        }

        .badges {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            color: white;
            min-width: 80px;
            text-align: center;
        }

        .price {
            background-color: #ff7f50;
        }

        .stock {
            background-color: #2ecc71;
        }

        @media (max-width: 768px) {
            .book-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .badges {
                flex-direction: row;
                justify-content: flex-start;
                margin-top: 10px;
            }

            .book-cover {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>
    <p>Selamat datang di halaman daftar buku kami.</p>

    <div class="book-list">
        @foreach ($books as $item)
            <div class="book-card">
                <img src="{{ $item['cover_photo'] }}" alt="Cover {{ $item['title'] }}" class="book-cover">
                
                <div class="book-info">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                </div>

                <div class="badges">
                    <div class="badge price">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                    <div class="badge stock">{{ $item['stock'] }} pcs</div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
