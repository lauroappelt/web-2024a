<?php
namespace App\Http\Controllers\Calamidades;

use Illuminate\Contracts\View\View;

class CalamidadesController
{
    public function index(): View
    {
        return view('calamidades.list');
    }
}