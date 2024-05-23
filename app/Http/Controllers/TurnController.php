<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\TurnService;
use App\Services\TypeDocumentService;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class TurnController extends Controller
{
    private $turnService, $categoryService, $typeDocumentService;
    public function __construct(
        TurnService $turnService,
        CategoryService $categoryService,
        TypeDocumentService $typeDocumentService
    )
    {
        $this->turnService = $turnService;
        $this->categoryService = $categoryService;
        $this->typeDocumentService = $typeDocumentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turns = $this->turnService->getTurns();

        return view('turns', compact('turns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getCategories();
        $typeDocuments = $this->typeDocumentService->getTypeDocuments();

        return view('create-turn', compact('categories', 'typeDocuments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $turn = $this->turnService->createTurn($request);

        return $turn;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->turnService->updateTurnStatus($id, $request->status);

        return redirect()->route('dashboard');
    }
}
