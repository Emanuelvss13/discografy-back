<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbunsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('albuns')->insert([
            'name' => 'chora e bebe',
            'artists_id' => 1
        ]);

        DB::table('albuns')->insert([
            'name' => 'Chorei na vaqueijada',
            'artists_id' => 1
        ]);
    }
}
