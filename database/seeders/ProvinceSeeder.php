<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            'Aceh' => ['Banda Aceh', 'Sabang', 'Lhokseumawe', 'Langsa', 'Meulaboh'],
            'Sumatera Utara' => ['Medan', 'Binjai', 'Tebing Tinggi', 'Pematangsiantar', 'Tanjungbalai'],
            'Sumatera Barat' => ['Padang', 'Bukittinggi', 'Padang Panjang', 'Payakumbuh', 'Sawahlunto'],
            'Riau' => ['Pekanbaru', 'Dumai', 'Batam', 'Tanjung Pinang', 'Bengkalis'],
            'Jambi' => ['Jambi', 'Sungai Penuh', 'Muaro Jambi', 'Bungo', 'Tebo'],
            'Sumatera Selatan' => ['Palembang', 'Prabumulih', 'Lubuklinggau', 'Pagar Alam', 'Lahat'],
            'Bengkulu' => ['Bengkulu', 'Curup', 'Argamakmur', 'Manna', 'Kaur'],
            'Lampung' => ['Bandar Lampung', 'Metro', 'Kotabumi', 'Liwa', 'Krui'],
            'DKI Jakarta' => ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur'],
            'Jawa Barat' => ['Bandung', 'Bekasi', 'Depok', 'Cimahi', 'Bogor'],
            'Jawa Tengah' => ['Semarang', 'Surakarta', 'Salatiga', 'Magelang', 'Pekalongan'],
            'DI Yogyakarta' => ['Yogyakarta', 'Bantul', 'Sleman', 'Kulon Progo', 'Gunung Kidul'],
            'Jawa Timur' => ['Surabaya', 'Malang', 'Kediri', 'Blitar', 'Mojokerto'],
            'Banten' => ['Serang', 'Tangerang', 'Cilegon', 'Tangerang Selatan', 'Pandeglang'],
            'Bali' => ['Denpasar', 'Ubud', 'Sanur', 'Kuta', 'Singaraja'],
            'Nusa Tenggara Barat' => ['Mataram', 'Bima', 'Dompu', 'Sumbawa Besar', 'Praya'],
            'Nusa Tenggara Timur' => ['Kupang', 'Ende', 'Maumere', 'Larantuka', 'Bajawa'],
            'Kalimantan Barat' => ['Pontianak', 'Singkawang', 'Sambas', 'Ketapang', 'Sintang'],
            'Kalimantan Tengah' => ['Palangka Raya', 'Sampit', 'Kuala Kapuas', 'Muara Teweh', 'Pangkalan Bun'],
            'Kalimantan Selatan' => ['Banjarmasin', 'Banjarbaru', 'Martapura', 'Kandangan', 'Amuntai'],
            'Kalimantan Timur' => ['Samarinda', 'Balikpapan', 'Bontang', 'Tarakan', 'Tenggarong'],
            'Kalimantan Utara' => ['Tanjung Selor', 'Tarakan', 'Nunukan', 'Malinau', 'Bulungan'],
            'Sulawesi Utara' => ['Manado', 'Bitung', 'Tomohon', 'Kotamobagu', 'Minahasa'],
            'Sulawesi Tengah' => ['Palu', 'Luwuk', 'Toli-Toli', 'Ampana', 'Poso'],
            'Sulawesi Selatan' => ['Makassar', 'Parepare', 'Palopo', 'Watampone', 'Bulukumba'],
            'Sulawesi Tenggara' => ['Kendari', 'Bau-Bau', 'Kolaka', 'Unaaha', 'Raha'],
            'Gorontalo' => ['Gorontalo', 'Limboto', 'Marisa', 'Tilamuta', 'Kwandang'],
            'Sulawesi Barat' => ['Mamuju', 'Majene', 'Polewali', 'Tobadak', 'Pasangkayu'],
            'Maluku' => ['Ambon', 'Tual', 'Masohi', 'Namlea', 'Dobo'],
            'Maluku Utara' => ['Ternate', 'Tidore', 'Sofifi', 'Tobelo', 'Labuha'],
            'Papua Barat' => ['Manokwari', 'Sorong', 'Fak-Fak', 'Kaimana', 'Raja Ampat'],
            'Papua' => ['Jayapura', 'Timika', 'Merauke', 'Nabire', 'Wamena'],
            'Papua Selatan' => ['Merauke', 'Boven Digoel', 'Mappi', 'Asmat', 'Yahukimo'],
            'Papua Tengah' => ['Nabire', 'Paniai', 'Mimika', 'Puncak Jaya', 'Deiyai'],
            'Papua Pegunungan' => ['Wamena', 'Jayawijaya', 'Pegunungan Bintang', 'Yahukimo', 'Tolikara'],
        ];

        foreach ($provinces as $provinceName => $regions) {
            $province = Province::create([
                'name' => $provinceName,
                'slug' => Str::slug($provinceName),
            ]);

            foreach ($regions as $regionName) {
                $baseSlug = Str::slug($regionName);
                $slug = $baseSlug;
                $i = 1;

                // Jika slug sudah ada, tambahkan angka
                while (Region::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }

                Region::create([
                    'name' => $regionName,
                    'slug' => $slug,
                    'province_id' => $province->id,
                ]);
            }
        }
    }
}