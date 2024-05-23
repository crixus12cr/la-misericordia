<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\AssignOp\Mod;

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
                'description' => 'Solicitud de citas medicas',
                'prefix' => 'SC'
            ],
            [
                'name' => 'Pago de facturas',
                'description' => 'Pago de facturas medicas y de servicios',
                'prefix' => 'PF'
            ],
            [
                'name' => 'Autorización de medicamentos',
                'description' => 'Autorización de medicamentos',
                'prefix' => 'AM'
            ],
            [
                'name' => 'Información en general',
                'description' => 'Información en general preguntas frecuentes',
                'prefix' => 'IG'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $modules = [
            [
                'name' => 'Módulo 1',
                'number' => 1,
            ],
            [
                'name' => 'Módulo 2',
                'number' => 2,
            ],
            [
                'name' => 'Módulo 3',
                'number' => 3,
            ],
            [
                'name' => 'Módulo 4',
                'number' => 4,
            ],
            [
                'name' => 'Módulo 5',
                'number' => 5,
            ],
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }

        $categories = Category::all();
        $modules = Module::all();

        foreach ($categories as $category) {
            $randomModules = $modules->random(rand(1, $modules->count()));
            $category->modules()->sync($randomModules->pluck('id')->toArray());
        }
    }
}
