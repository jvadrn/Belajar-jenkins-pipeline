<?php

namespace Database\Seeders;

use App\Models\User\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
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
                'id_penerbit' => 'SP01', 
                'nama' => 'Penerbit Informatika',
                'alamat' => 'Jl. Buah Batu No. 121',
                'kota' => 'Bandung', 
                'telepon' => '081322201946',
            ],
            [
                'id_penerbit' => 'SP02', 
                'nama' => 'Andi Offset',
                'alamat' => 'Jl. Suryalaya IX No.3',
                'kota' => 'Bandung', 
                'telepon' => '087839030688',
            ],
            [
                'id_penerbit' => 'SP03', 
                'nama' => 'Danendra',
                'alamat' => 'Jl. Moch Toha 44',
                'kota' => 'Bandung', 
                'telepon' => '0225201215',
            ],
        ];

        Penerbit::insert($data);
    }
}
