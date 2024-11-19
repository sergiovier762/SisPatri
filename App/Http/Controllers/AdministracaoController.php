<?php

namespace app\Http\Controllers;

use app\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministracaoController extends Controller
{
    public function index(Request $request)
    {
        return view('Administracao/index');
    }
    
}
