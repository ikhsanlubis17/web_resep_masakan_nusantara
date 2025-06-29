<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['name' => 'Aceh', 'description' => 'Masakan khas Provinsi Aceh dengan cita rasa rempah yang kuat', 'icon' => 'bi-geo-alt-fill', 'color' => '#dc2626', 'background_image' => 'aceh.jpg'],
            ['name' => 'Sumatera Utara', 'description' => 'Kuliner tradisional Sumatera Utara yang kaya akan bumbu', 'icon' => 'bi-geo-alt-fill', 'color' => '#ea580c', 'background_image' => 'sumatera_utara.jpg'],
            ['name' => 'Sumatera Barat', 'description' => 'Masakan Padang dan kuliner khas Minangkabau', 'icon' => 'bi-geo-alt-fill', 'color' => '#f59e0b', 'background_image' => 'sumatera_barat.jpg'],
            ['name' => 'Riau', 'description' => 'Hidangan tradisional Melayu Riau', 'icon' => 'bi-geo-alt-fill', 'color' => '#eab308', 'background_image' => 'riau.jpg'],
            ['name' => 'Kepulauan Riau', 'description' => 'Kuliner kepulauan dengan cita rasa laut', 'icon' => 'bi-geo-alt-fill', 'color' => '#84cc16', 'background_image' => 'kepulauan_riau.jpg'],
            ['name' => 'Jambi', 'description' => 'Masakan tradisional Jambi yang autentik', 'icon' => 'bi-geo-alt-fill', 'color' => '#22c55e', 'background_image' => 'jambi.jpg'],
            ['name' => 'Sumatera Selatan', 'description' => 'Kuliner khas Palembang dan sekitarnya', 'icon' => 'bi-geo-alt-fill', 'color' => '#10b981', 'background_image' => 'sumatera_selatan.jpg'],
            ['name' => 'Bangka Belitung', 'description' => 'Hidangan seafood dan kuliner kepulauan', 'icon' => 'bi-geo-alt-fill', 'color' => '#14b8a6', 'background_image' => 'bangka_belitung.jpg'],
            ['name' => 'Bengkulu', 'description' => 'Masakan tradisional Bengkulu', 'icon' => 'bi-geo-alt-fill', 'color' => '#06b6d4', 'background_image' => 'bengkulu.jpg'],
            ['name' => 'Lampung', 'description' => 'Kuliner khas Lampung dengan bumbu khas', 'icon' => 'bi-geo-alt-fill', 'color' => '#0ea5e9', 'background_image' => 'lampung.jpg'],
            ['name' => 'DKI Jakarta', 'description' => 'Kuliner Betawi dan masakan ibu kota', 'icon' => 'bi-geo-alt-fill', 'color' => '#3b82f6', 'background_image' => 'dki_jakarta.jpg'],
            ['name' => 'Jawa Barat', 'description' => 'Masakan Sunda dan kuliner Jawa Barat', 'icon' => 'bi-geo-alt-fill', 'color' => '#6366f1', 'background_image' => 'jawa_barat.jpg'],
            ['name' => 'Jawa Tengah', 'description' => 'Kuliner Solo, Semarang, dan Jawa Tengah', 'icon' => 'bi-geo-alt-fill', 'color' => '#8b5cf6', 'background_image' => 'jawa_tengah.jpg'],
            ['name' => 'DI Yogyakarta', 'description' => 'Masakan khas Yogyakarta dan gudeg', 'icon' => 'bi-geo-alt-fill', 'color' => '#a855f7', 'background_image' => 'yogyakarta.jpg'],
            ['name' => 'Jawa Timur', 'description' => 'Kuliner Surabaya, Malang, dan Jawa Timur', 'icon' => 'bi-geo-alt-fill', 'color' => '#c084fc', 'background_image' => 'jawa_timur.jpg'],
            ['name' => 'Banten', 'description' => 'Masakan tradisional Banten', 'icon' => 'bi-geo-alt-fill', 'color' => '#d946ef', 'background_image' => 'banten.jpg'],
            ['name' => 'Bali', 'description' => 'Kuliner Hindu Bali dengan bumbu khas', 'icon' => 'bi-geo-alt-fill', 'color' => '#ec4899', 'background_image' => 'bali.jpg'],
            ['name' => 'Nusa Tenggara Barat', 'description' => 'Masakan Lombok dan Sumbawa', 'icon' => 'bi-geo-alt-fill', 'color' => '#f43f5e', 'background_image' => 'ntb.jpg'],
            ['name' => 'Nusa Tenggara Timur', 'description' => 'Kuliner Flores, Timor, dan NTT', 'icon' => 'bi-geo-alt-fill', 'color' => '#ef4444', 'background_image' => 'ntt.jpg'],
            ['name' => 'Kalimantan Barat', 'description' => 'Masakan Dayak dan Melayu Kalimantan', 'icon' => 'bi-geo-alt-fill', 'color' => '#f97316', 'background_image' => 'kalimantan_barat.jpg'],
            ['name' => 'Kalimantan Tengah', 'description' => 'Kuliner tradisional Kalimantan Tengah', 'icon' => 'bi-geo-alt-fill', 'color' => '#fb923c', 'background_image' => 'kalimantan_tengah.jpg'],
            ['name' => 'Kalimantan Selatan', 'description' => 'Masakan Banjar dan Kalimantan Selatan', 'icon' => 'bi-geo-alt-fill', 'color' => '#fdba74', 'background_image' => 'kalimantan_selatan.jpg'],
            ['name' => 'Kalimantan Timur', 'description' => 'Kuliner khas Kalimantan Timur', 'icon' => 'bi-geo-alt-fill', 'color' => '#fed7aa', 'background_image' => 'kalimantan_timur.jpg'],
            ['name' => 'Kalimantan Utara', 'description' => 'Masakan tradisional Kalimantan Utara', 'icon' => 'bi-geo-alt-fill', 'color' => '#fef3c7', 'background_image' => 'kalimantan_utara.jpg'],
            ['name' => 'Sulawesi Utara', 'description' => 'Kuliner Manado dan Minahasa', 'icon' => 'bi-geo-alt-fill', 'color' => '#065f46', 'background_image' => 'sulawesi_utara.jpg'],
            ['name' => 'Sulawesi Tengah', 'description' => 'Masakan tradisional Sulawesi Tengah', 'icon' => 'bi-geo-alt-fill', 'color' => '#047857', 'background_image' => 'sulawesi_tengah.jpg'],
            ['name' => 'Sulawesi Selatan', 'description' => 'Kuliner Makassar dan Bugis', 'icon' => 'bi-geo-alt-fill', 'color' => '#059669', 'background_image' => 'sulawesi_selatan.jpg'],
            ['name' => 'Sulawesi Tenggara', 'description' => 'Masakan khas Sulawesi Tenggara', 'icon' => 'bi-geo-alt-fill', 'color' => '#0d9488', 'background_image' => 'sulawesi_tenggara.jpg'],
            ['name' => 'Gorontalo', 'description' => 'Kuliner tradisional Gorontalo', 'icon' => 'bi-geo-alt-fill', 'color' => '#0891b2', 'background_image' => 'gorontalo.jpg'],
            ['name' => 'Sulawesi Barat', 'description' => 'Masakan tradisional Sulawesi Barat', 'icon' => 'bi-geo-alt-fill', 'color' => '#0284c7', 'background_image' => 'sulawesi_barat.jpg'],
            ['name' => 'Maluku', 'description' => 'Kuliner kepulauan Maluku', 'icon' => 'bi-geo-alt-fill', 'color' => '#2563eb', 'background_image' => 'maluku.jpg'],
            ['name' => 'Maluku Utara', 'description' => 'Masakan tradisional Maluku Utara', 'icon' => 'bi-geo-alt-fill', 'color' => '#4f46e5', 'background_image' => 'maluku_utara.jpg'],
            ['name' => 'Papua', 'description' => 'Kuliner tradisional Papua', 'icon' => 'bi-geo-alt-fill', 'color' => '#7c3aed', 'background_image' => 'papua.jpg'],
            ['name' => 'Papua Barat', 'description' => 'Masakan khas Papua Barat', 'icon' => 'bi-geo-alt-fill', 'color' => '#9333ea', 'background_image' => 'papua_barat.jpg'],
        ];

        // Delete existing categories first
        Category::query()->delete();

        foreach ($provinces as $province) {
            Category::create([
                'name' => $province['name'],
                'slug' => Str::slug($province['name']),
                'description' => $province['description'],
                'icon' => $province['icon'],
                'color' => $province['color'],
                'background_image' => $province['background_image'] ?? null,
                'is_active' => true,
            ]);
        }
    }
}