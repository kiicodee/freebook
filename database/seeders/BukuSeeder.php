<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'namaBuku' => 'Petualangan Sijono',
            'penulisId' => 1,
            'kategoriId' => 3,
            'deskripsi' => 'Buku ini tentang petualangan sijono dan teman teman',
            'sampul' => 'petualanganjono.jpg',
            'ebook' => 'petualanganjono.pdf',
            'status' => 'waiting_approval',
            'tanggal_publish' => date_create()
        ]);
    }
}
