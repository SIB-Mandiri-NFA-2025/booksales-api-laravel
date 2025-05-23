<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya.',
            'price' => 40000,
            'stock' => 15,
            'cover_photo' => 'https://cdn.gramedia.com/uploads/items/pulang_tere_liye.jpeg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);

        Book::create([
            'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
            'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seseorang.',
            'price' => 25000,
            'stock' => 5,
            'cover_photo' => 'https://upload.wikimedia.org/wikipedia/commons/4/4b/Sebuah-seni-untuk-bersikap-bodoh-amat.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => 'Naruto: The Last',
            'description' => 'Novel yang menceritakan kisah cinta Naruto dan Hinata.',
            'price' => 30000,
            'stock' => 55,
            'cover_photo' => 'https://upload.wikimedia.org/wikipedia/id/0/0c/TheLastNarutomovie.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);

        Book::create([
            'title' => 'Harry Potter and the Philosopher\'s Stone',
            'description' => 'Buku pertama dari seri Harry Potter yang menceritakan petualangan Harry di Hogwarts.',
            'price' => 50000,
            'stock' => 20,
            'cover_photo' => 'https://images.justwatch.com/poster/87608067/s718/harry-potter-and-the-philosophers-stone.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);

        Book::create([
            'title' => 'The Great Gatsby',
            'description' => 'Novel klasik yang menggambarkan kehidupan masyarakat Amerika pada tahun 1920-an.',
            'price' => 60000,
            'stock' => 10,
            'cover_photo' => 'https://upload.wikimedia.org/wikipedia/id/2/26/TheGreatGatsby2012Poster.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ]);
    }
}
