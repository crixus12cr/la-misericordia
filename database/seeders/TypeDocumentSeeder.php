<?php

namespace Database\Seeders;

use App\Models\TypeDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Cédula de ciudadanía'],
            ['name' => 'Tarjeta de Identidad'],
            ['name' => 'Cédula de Extranjería']
        ];

        foreach ($types as $type) {
            TypeDocument::create($type);
        }
    }
}
