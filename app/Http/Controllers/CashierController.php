<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\recipe;


class CashierController extends Controller
{
    public function index()
    {
        //
        $recipes = recipe::sortable()->where('flag', 1)->paginate(5);

        //render view with recipe
        return view('kasir.index', compact('recipes'));
    }
}