<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create( [
            'name' => 'Tere Liye',
            'photo' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQOIjpIKwkAayiq1yTOK5UtFrHWXFFydoCRJHUQJtWhZRojT16YqZnpDWxHO-xAub3tdtqBKyPrp16SA5DsXEFqxA',
            'bio' => 'Tere Liye adalah seorang penulis asal Indonesia yang terkenal dengan karya-karya fiksi dan novel-novelnya yang menyentuh hati.'
        ]);
        Author::create( [
            'name' => 'Mark Manson',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Mark-manson-headshot-2018-1.jpg/640px-Mark-manson-headshot-2018-1.jpg',
            'bio' => 'Mark Manson adalah seorang penulis dan blogger asal Amerika Serikat yang dikenal dengan buku-buku pengembangan diri yang provokatif.'
        ]);
        Author::create( [
            'name' => 'Masashi Kishimoto',
            'photo' => 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcRsoIo8007uKBtMVRXEyc2GhmuZPnc1Q0vPEkGnaFsc4t-SJ3Bu-jRHj4wifzHjs6fUj5fW2gOBRPtLDrfe9wa39g',
            'bio' => 'Masashi Kishimoto adalah seorang mangaka asal Jepang yang terkenal dengan serial manga Naruto yang sangat populer di seluruh dunia.'
        ]); 
        Author::create( [
            'name' => 'J.K. Rowling',
            'photo' => 'https://i0.wp.com/suarausu.or.id/wp-content/uploads/2022/02/penulis-harry-potter-j-k-rowling-sempat-rasakan-gejala-virus-corona-iYz-thumb.jpg?fit=480%2C319&ssl=1',
            'bio' => 'J.K. Rowling adalah seorang penulis asal Inggris yang terkenal dengan seri novel Harry Potter yang telah menjadi fenomena global.'
        ]); 
        Author::create( [
            'name' => 'F. Scott Fitzgerald',
            'photo' => 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQz_g8YsVrcxxZqpyEWUnjgasSLFNRkHfWmXaRNoimJ6gZQ7ya84VoHZ9qHZWK-gz2fAqWU_FUtGQPukzxSjlWn6g',
            'bio' => 'F. Scott Fitzgerald adalah seorang penulis asal Amerika Serikat yang dikenal dengan novel klasiknya, The Great Gatsby, yang menggambarkan kehidupan masyarakat pada tahun 1920-an.'
        ]); 
    }
}
