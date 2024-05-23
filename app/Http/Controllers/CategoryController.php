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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = $this->categoryService->asignModules($request, $id);

        return redirect()->route('module');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
