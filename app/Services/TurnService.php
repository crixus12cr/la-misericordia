<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Turn;
use App\Models\User;
use Illuminate\Http\Request;

class TurnService
{
    public function getAll(Request $request)
    {
        if ($request->has('status') && $request->status !== 'all') {
            // dd($request->status);
            $turn = Turn::where('status', $request->status)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $turn = Turn::orderBy('id', 'desc')
                ->get();
        }
        return $turn;
    }

    public function getTurns()
    {
        $turns = Turn::where('status', Turn::STATUS_PENDING)
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->orderBy('id', 'asc')
            ->get();

        return $turns;
    }

    public function createTurn(Request $request)
    {
        $user = User::where('number_document', $request->numberDocument)->first() ?? User::create([
            'name' => $request->name,
            'number_document' => $request->numberDocument,
            'type_document_id' => $request->typeDocument,
        ]);

        $category = Category::find($request->category);

        // Encuentra el modulo con menos turnos asignados que fueron creados hoy y están en estado pendiente
        $module = $category->modules()->withCount(['turns' => function ($query) {
            $query->where('status', Turn::STATUS_PENDING)
                ->whereDate('created_at', now()->format('Y-m-d'));
        }])->orderBy('turns_count')->first();


        $turn = Turn::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'module_id' => $module->id,
            'status' => Turn::STATUS_PENDING,
        ]);

        return response()->json(['turn' => $turn], 200);
    }

    public function updateTurnStatus(string $id, string $status)
    {
        $turn = Turn::find($id);
        $turn->status = $status;
        $turn->save();

        return response()->json(['turn' => $turn], 200);
    }
}
