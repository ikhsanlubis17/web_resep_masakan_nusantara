<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $categories = Category::all();

        $recipes = [
            [
                'title' => 'Rendang Daging Minang',
                'description' => 'Rendang adalah masakan berbahan dasar daging sapi yang dimasak perlahan dalam santan dan campuran rempah-rempah khas seperti serai, lengkuas, jahe, kunyit, bawang, cabai, dan berbagai bumbu lainnya.',
                'ingredients' => "1 kg daging sapi (bagian sengkel atau paha), potong-potong sedang\n10 siung bawang merah\n6 siung bawang putih\n5 butir kemiri, sangrai\n100 gram cabai merah keriting (sesuaikan tingkat pedas)\n2 cm jahe\n2 cm lengkuas\n2 cm kunyit, bakar sebentar\n1 sdt ketumbar\n1 sdt jintan, sangrai\nGaram secukupnya\n2 batang serai, memarkan\n4 lembar daun jeruk purut\n2 lembar daun salam\n2 lembar daun kunyit, simpulkan\n1 buah kelapa tua, parut, ambil santannya",
                'instructions' => "Haluskan bawang merah, bawang putih, kemiri, cabai merah, jahe, lengkuas, kunyit, ketumbar, dan jintan hingga halus.\nTumis bumbu halus hingga harum dan matang.\nMasukkan daging sapi, aduk rata dengan bumbu.\nTambahkan serai, daun jeruk, daun salam, dan daun kunyit.\nTuang santan, masak dengan api sedang sambil terus diaduk.\nMasak hingga santan menyusut dan bumbu meresap ke dalam daging.\nKecilkan api, masak terus sambil sesekali diaduk hingga kuah mengental dan berwarna cokelat kehitaman.\nMasak hingga daging empuk dan bumbu kering menempel pada daging.\nAngkat dan sajikan.",
                'prep_time' => 45,
                'cook_time' => 180,
                'servings' => 6,
                'difficulty' => 'Sulit',
                'tags' => 'rendang, daging, minang, pedas, santan',
                'category_id' => $categories->where('name', 'Sumatera Barat')->first()->id ?? 1,
            ],
            [
                'title' => 'Gudeg Yogya Khas',
                'description' => 'Gudeg adalah makanan khas Yogyakarta yang terbuat dari nangka muda yang dimasak dengan santan. Gudeg biasanya dimakan dengan nasi dan disajikan dengan kuah santan yang kental, telur, dan sambal goreng krecek.',
                'ingredients' => "1 kg nangka muda, potong-potong\n500 ml santan kental\n200 ml santan encer\n5 lembar daun salam\n3 lembar daun pandan\n2 batang serai, memarkan\n3 cm lengkuas, memarkan\n2 sdt garam\n3 sdm gula merah, sisir halus\n1 sdt ketumbar, sangrai dan tumbuk kasar\nTelur ayam rebus\nSambal goreng krecek",
                'instructions' => "Rebus nangka muda dengan air garam hingga empuk, tiriskan.\nMasukkan nangka ke dalam wajan, tambahkan santan encer.\nTambahkan daun salam, daun pandan, serai, dan lengkuas.\nMasak dengan api kecil sambil terus diaduk.\nTambahkan gula merah, garam, dan ketumbar.\nTuang santan kental sedikit demi sedikit sambil terus diaduk.\nMasak hingga santan menyusut dan bumbu meresap.\nMasak terus hingga kuah mengental dan berwarna cokelat.\nSajikan dengan nasi, telur, dan sambal goreng krecek.",
                'prep_time' => 30,
                'cook_time' => 120,
                'servings' => 4,
                'difficulty' => 'Sedang',
                'tags' => 'gudeg, yogya, nangka, santan, manis',
                'category_id' => $categories->where('name', 'DI Yogyakarta')->first()->id ?? 2,
            ],
            [
                'title' => 'Gado-Gado Jakarta',
                'description' => 'Gado-gado adalah salad Indonesia yang terdiri dari sayuran rebus, tahu, tempe, telur rebus, dan kerupuk yang disiram dengan bumbu kacang yang gurih dan sedikit pedas.',
                'ingredients' => "200 gram kacang tanah, goreng\n3 siung bawang putih\n2 buah cabai merah\n1 sdt terasi, bakar\n2 sdm gula merah\n1 sdt garam\n2 sdm air asam jawa\nSayuran: kangkung, kol, tauge, wortel, kentang\nTahu dan tempe goreng\nTelur rebus\nKerupuk\nBawang goreng",
                'instructions' => "Rebus semua sayuran hingga matang, tiriskan.\nHaluskan kacang tanah yang sudah digoreng.\nHaluskan bawang putih, cabai, dan terasi.\nCampur kacang halus dengan bumbu halus.\nTambahkan gula merah, garam, dan air asam jawa.\nAduk rata hingga menjadi bumbu kacang yang kental.\nTata sayuran, tahu, tempe, dan telur di piring.\nSiram dengan bumbu kacang.\nTaburi bawang goreng dan sajikan dengan kerupuk.",
                'prep_time' => 25,
                'cook_time' => 20,
                'servings' => 4,
                'difficulty' => 'Mudah',
                'tags' => 'gado-gado, salad, sayuran, kacang, sehat',
                'category_id' => $categories->where('name', 'DKI Jakarta')->first()->id ?? 3,
            ],
            [
                'title' => 'Ayam Betutu Bali',
                'description' => 'Ayam Betutu adalah makanan khas Bali berupa ayam utuh yang dibumbui dengan bumbu khas Bali dan dibungkus daun kemudian dipanggang atau dikukus dalam waktu yang lama.',
                'ingredients' => "1 ekor ayam utuh\n10 siung bawang merah\n8 siung bawang putih\n5 cm jahe\n3 cm kunyit\n3 cm kencur\n2 sdt ketumbar\n1 sdt merica\n5 butir kemiri\n3 buah cabai merah besar\n2 sdt garam\n2 sdm minyak\nDaun pisang untuk membungkus",
                'instructions' => "Bersihkan ayam, lumuri dengan garam dan jeruk nipis.\nHaluskan semua bumbu: bawang merah, bawang putih, jahe, kunyit, kencur, ketumbar, merica, kemiri, dan cabai.\nTumis bumbu halus hingga harum.\nLumuri ayam dengan bumbu yang sudah ditumis, diamkan 30 menit.\nBungkus ayam dengan daun pisang yang sudah dilayukan.\nPanggang dalam oven dengan suhu 180°C selama 2-3 jam.\nAtau kukus selama 3-4 jam hingga ayam empuk.\nSajikan dengan nasi dan sambal matah.",
                'prep_time' => 60,
                'cook_time' => 180,
                'servings' => 4,
                'difficulty' => 'Sulit',
                'tags' => 'ayam betutu, bali, panggang, pedas, tradisional',
                'category_id' => $categories->where('name', 'Bali')->first()->id ?? 4,
            ],
            [
                'title' => 'Soto Betawi Jakarta',
                'description' => 'Soto Betawi adalah soto khas Jakarta yang menggunakan santan dan susu, dengan isian daging sapi, jeroan, dan tomat. Rasanya gurih dan segar.',
                'ingredients' => "500 gram daging sapi, potong dadu\n200 gram jeroan sapi (paru, hati)\n1 liter air\n400 ml santan\n200 ml susu cair\n3 buah tomat, potong-potong\n2 batang serai\n3 lembar daun salam\n2 cm jahe\n5 siung bawang merah\n3 siung bawang putih\n1 sdt ketumbar\nGaram dan merica\nBawang goreng\nEmping\nSambal",
                'instructions' => "Rebus daging dan jeroan hingga empuk, sisihkan kaldu.\nHaluskan bawang merah, bawang putih, jahe, dan ketumbar.\nTumis bumbu halus hingga harum.\nMasukkan bumbu tumis ke dalam kaldu.\nTambahkan serai, daun salam, dan tomat.\nTuang santan dan susu, masak hingga mendidih.\nBumbui dengan garam dan merica.\nMasukkan daging dan jeroan yang sudah direbus.\nMasak hingga bumbu meresap.\nSajikan dengan nasi, bawang goreng, emping, dan sambal.",
                'prep_time' => 30,
                'cook_time' => 90,
                'servings' => 6,
                'difficulty' => 'Sedang',
                'tags' => 'soto betawi, jakarta, santan, daging, jeroan',
                'category_id' => $categories->where('name', 'DKI Jakarta')->first()->id ?? 3,
            ]
        ];

        foreach ($recipes as $recipeData) {
            Recipe::create([
                'title' => $recipeData['title'],
                'slug' => Str::slug($recipeData['title']),
                'description' => $recipeData['description'],
                'ingredients' => $recipeData['ingredients'],
                'instructions' => $recipeData['instructions'],
                'prep_time' => $recipeData['prep_time'],
                'cook_time' => $recipeData['cook_time'],
                'servings' => $recipeData['servings'],
                'difficulty' => $recipeData['difficulty'],
                'tags' => $recipeData['tags'],
                'status' => 'approved',
                'user_id' => $user->id,
                'category_id' => $recipeData['category_id'],
                'views' => rand(10, 1000),
                'rating' => rand(35, 50) / 10, // 3.5 - 5.0
            ]);
        }
    }
}