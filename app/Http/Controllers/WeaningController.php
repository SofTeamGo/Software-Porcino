<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeaningRequest;
use App\Reproducer;
use App\Weaning;
use Illuminate\Http\Request;

class WeaningController extends Controller
{
    public function create(Request $request)
    {
        $id = 0;
        if ($request->has('female')) {
            $id = $request->get('female');
        }
        $females = Reproducer::orderBy('id', 'DESC')->select('id', 'code')->where('sex', 'HEMBRA')->get();
        return view('weaning.create', compact('id', 'females'));
    }

    public function store(WeaningRequest $request)
    {
        if ($request->ajax()) {
            $weaning = Weaning::create([
                'date'          => $request->date,
                'quantity'      => $request->quantity,
                'weight'        => $request->weight,
                'average'       => $request->average,
                'observation'   => $request->observation,
                'reproducer_id' => $request->reproducer,
            ]);
            return response()->json([
                'success'    => true,
                'reproducer' => $weaning->reproducer_id,
                'message'    => message('MSG001'),
            ], 201);
        }
        return response()->json(['message' => message('MSG009')], 401);
    }
}
