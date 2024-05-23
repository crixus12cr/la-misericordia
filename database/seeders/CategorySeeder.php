<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Solicitud de citas',
                'description' =>'Solicitud de citas medicas',
                'prefix' => 'SC'
            ],
            [
                'name' => 'Pago de facturas',
                'description' =>'Pago de facturas medicas y de servicios',
                'prefix' => 'PF'
            ],
            [
                'name' => 'Autorización de medicamentos',
                'description' =>'Autorización de medicamentos',
                'prefix' => 'AM'
            ],
            [
                'name' => 'Información en general',
                'description' =>'Información en general preguntas frecuentes',
                'prefix' => 'IG'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
