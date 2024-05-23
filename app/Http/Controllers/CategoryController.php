<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ModuleService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService, $moduleService;
    public function __construct(
        CategoryService $categoryService,
        ModuleService $moduleService
    )
    {
        $this->categoryService = $categoryService;
        $this->moduleService = $moduleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryService->getCategories();
        $modulos = $this->moduleService->getModules();

        return view('module', compact('categories', 'modulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = $this->categoryService->asignModules($request, $id);

        return redirect()->route('module');
    }
}
