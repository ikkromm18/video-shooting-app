<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_layanan' => 'Wedding',
            ],
            [
                'nama_layanan' => 'Live Stream',
            ],
            [
                'nama_layanan' => 'Sinematik',
            ],
            [
                'nama_layanan' => 'Video Profil',
            ],
        ];

        DB::table('layanans')->insert($data);
    }
}
