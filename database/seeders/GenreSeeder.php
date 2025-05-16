<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Fiksi',
            'description' => 'Fiksi adalah genre yang mencakup cerita yang tidak berdasarkan pada fakta nyata. Ini termasuk novel, cerpen, dan karya sastra lainnya yang diciptakan dari imajinasi penulis.'
        ]);
        Genre::create([
            'name' => 'Pengembangan Diri',
            'description' => 'Pengembangan diri adalah genre yang berfokus pada peningkatan kualitas hidup individu. Ini mencakup buku-buku tentang motivasi, psikologi, dan strategi untuk mencapai tujuan pribadi.'
        ]);
        Genre::create([
            'name' => 'Anime / Manga',
            'description' => 'Anime dan manga adalah genre yang berasal dari Jepang. Anime adalah animasi, sedangkan manga adalah komik. Keduanya sering memiliki cerita yang mendalam dan karakter yang kompleks.'
        ]);
        Genre::create([
            'name' => 'Fantasi',
            'description' => 'Fantasi adalah genre yang mencakup elemen-elemen magis dan dunia imajinatif. Ini sering melibatkan makhluk mitos, sihir, dan petualangan di dunia yang tidak nyata.'
        ]);
        Genre::create([
            'name' => 'Klasik',
            'description' => 'Klasik adalah genre yang mencakup karya-karya sastra yang telah diakui sebagai penting dan berpengaruh dalam sejarah sastra. Ini termasuk novel, puisi, dan drama yang telah bertahan sepanjang waktu.'
        ]);
    }
}
