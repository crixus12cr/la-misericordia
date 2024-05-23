<?php

namespace App\Http\Controllers;

use App\Services\TurnService;
use Illuminate\Http\Request;

class AdminTurnController extends Controller
{

    private $turnService;
    public function __construct(
        TurnService $turnService
    )
    {
        $this->turnService = $turnService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turns = $this->turnService->getAll(request());

        return view('dashboard', compact('turns'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}