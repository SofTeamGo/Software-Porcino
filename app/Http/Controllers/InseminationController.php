<?php

namespace App\Http\Controllers;

use App\Http\Requests\InseminationRequest;
use App\Reproducer;
use App\Semen;
use Illuminate\Http\Request;

class InseminationController extends Controller
{
    public function create(Request $request)
    {
        $id = 0;
        if ($request->has('female')) {
            $id = $request->get('female');
        }
        $females = Reproducer::orderBy('id', 'DESC')->select('id', 'code')->where('sex', 'HEMBRA')->get();
        $semen   = Semen::orderBy('id', 'DESC')->select('id', 'code')->get();
        $data    = [
            'females' => $females,
            'semen'   => $semen,
        ];
        return view('inseminations.create', compact('id', 'data'));
    }

    public function store(InseminationRequest $request)
    {

    }
}
