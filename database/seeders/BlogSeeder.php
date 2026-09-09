<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            'title' => 'Blog 1',
            'deskripsi' => 'Ini adalah deskripsi untuk Blog 1',
            'status' => 'Active',
            'user_id' => 1
        ]);
    }
}
