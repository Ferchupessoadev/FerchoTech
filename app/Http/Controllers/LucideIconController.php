<?php

namespace App\Http\Controllers;

use App\Models\LucideIcon;
use Illuminate\Http\Request;

class LucideIconController extends Controller
{
    function index(Request $request)
    {
        $search = $request->query('q');

        if (empty($search)) {
            return response()->json(LucideIcon::take(24)->pluck('id'));
        }

        $iconos = LucideIcon::where('id', 'like', "%{$search}%")->take(40)->pluck('id');

        return response()->json($iconos);
    }

}
