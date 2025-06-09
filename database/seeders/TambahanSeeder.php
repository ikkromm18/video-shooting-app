<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TambahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'nama_tambahan' => 'Drone'
            ],
            [
                'nama_tambahan' => 'JimmyJib'
            ]
        ];

        DB::table('tambahans')->insert($data);
    }
}
