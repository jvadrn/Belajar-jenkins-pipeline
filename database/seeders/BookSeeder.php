<?php

namespace Database\Seeders;

use App\Models\User\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_buku' => 'B1001', 
                'nama_buku' => 'Bisnis Online',
                'kategori' => 'Bisnis',
                'harga' => 75000, 
                'stok' => 9,
                'penerbit' => 'Penerbit Informatika',
            ],
            [
                'id_buku' => 'K3004', 
                'nama_buku' => 'Cloud Computing Technologi',
                'kategori' => 'Keilmuan',
                'harga' => 85000, 
                'stok' => 15,
                'penerbit' => 'Penerbit Informatika',
            ],
            [
                'id_buku' => 'N1001', 
                'nama_buku' => 'Novel',
                'kategori' => 'Cahaya Di Penjuru Hati',
                'harga' => 68000, 
                'stok' => 10,
                'penerbit' => 'Andi Offset',
            ],
            [
                'id_buku' => 'N1002', 
                'nama_buku' => 'Novel',
                'kategori' => 'Aku Ingin Cerita',
                'harga' => 48000, 
                'stok' => 12,
                'penerbit' => 'Danendra',
            ],
        ];

        Book::insert($data);
    }
}
