<?php

namespace App\Http\Controllers;

use App\Reproducer;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

class ReproducerController extends Controller
{
    public function index()
    {
        return view('reproducers.females.index');
    }

    public function listReproducers(Request $request)
    {
        if (true) {
            $reproducers = Reproducer::select(['id', 'code', 'created_at']);

            return Datatables::of($reproducers)
                ->rawColumns(['show', 'action', 'events'])
                ->addColumn('show', function ($reproducer) {
                    return view('reproducers.females.datatables.show', compact('reproducer'));
                })
                ->addColumn('action', function ($reproducer) {
                    return view('reproducers.females.datatables.actions', compact('reproducer'));
                })
                ->addColumn('events', function ($reproducer) {
                    return view('reproducers.females.datatables.events', compact('reproducer'));
                })
                ->make(true);
        }
    }
}
