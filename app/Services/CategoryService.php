<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    public function getCategories()
    {
        return Category::all();
    }

    public function asignModules(Request $request, $id)
    {
        $category = Category::find($id);
        $modules = $request->modulos;
        $category->modules()->sync($modules);

        return response()->json(['message' => 'Modulos asignados correctamente.'], 200);
    }
}
