<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
      private $genres = [
        [
            'id' => 1, 
            'name' => 'Fiksi',
            'description' => 'Fiksi adalah genre yang mencakup cerita yang tidak berdasarkan pada fakta nyata. Ini termasuk novel, cerpen, dan karya sastra lainnya yang diciptakan dari imajinasi penulis.'
        ],
        [
            'id' => 2, 
            'name' => 'Pengembangan Diri',
            'description' => 'Pengembangan diri adalah genre yang berfokus pada peningkatan kualitas hidup individu. Ini mencakup buku-buku tentang motivasi, psikologi, dan strategi untuk mencapai tujuan pribadi.'
        ],
        [
            'id' => 3, 
            'name' => 'Anime / Manga',
            'description' => 'Anime dan manga adalah genre yang berasal dari Jepang. Anime adalah animasi, sedangkan manga adalah komik. Keduanya sering memiliki cerita yang mendalam dan karakter yang kompleks.'
        ],
        [
            'id' => 4, 
            'name' => 'Fantasi',
            'description' => 'Fantasi adalah genre yang mencakup elemen-elemen magis dan dunia imajinatif. Ini sering melibatkan makhluk mitos, sihir, dan petualangan di dunia yang tidak nyata.'
        ],
        [
            'id' => 5, 
            'name' => 'Klasik',
            'description' => 'Klasik adalah genre yang mencakup karya-karya sastra yang telah diakui sebagai penting dan berpengaruh dalam sejarah sastra. Ini termasuk novel, puisi, dan drama yang telah bertahan sepanjang waktu.'
        ],
    ];

    public function getGenres()
    {
        return $this->genres;
    }

}
