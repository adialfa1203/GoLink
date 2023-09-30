<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footer = Footer::create([
            'logo' => 'logos/1.jpg',
            'description' => null,
            'whatsapp' => null,
            'instagram' => null,
            'twitter' => null
        ]);
    }
}
