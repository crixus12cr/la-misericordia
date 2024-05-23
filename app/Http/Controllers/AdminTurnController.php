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
}
