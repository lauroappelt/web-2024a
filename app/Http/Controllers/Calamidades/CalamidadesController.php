<?php

namespace App\Http\Controllers\Calamidades;

use App\Models\Calamidade;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CalamidadesController
{
    public function index(): View
    {
        $calamidades = Calamidade::where('user_id', '=', Auth::user()->id)
            ->get();

        return view('calamidades.list', compact(
            'calamidades',
        ));
    }

    public function create(): View
    {
        return view('calamidades.form');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'date_start' => 'required'
            ]);
            
            $data = $request->only([
                'name',
                'description',
                'date_start'
            ]);

            $data['user_id'] = Auth::user()->id;
            $data['status'] = 'PENDENTE'; 

            $calamidade = new Calamidade($data);
    
            $calamidade->save();
    
            return redirect(
                route('calamidades')
            );
        } catch (Throwable $th) {
            dd($th->getMessage());
        }
        
    }
}
