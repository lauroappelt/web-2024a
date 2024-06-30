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
        $user = Auth::user();

        if ($user->is_admin) {
            $calamidades = Calamidade::all();
        } else {
            $calamidades = Calamidade::where('user_id', '=', Auth::user()->id)->get();
        }

        return view('calamidades.list', compact(
            'calamidades',
            'user'
        ));
    }

    public function create(): View
    {
        $tipos = Calamidade::listaTipos();
        return view('calamidades.create', compact('tipos'));
    }

    public function update(Request $request): View
    {
        $id = $request->route('id');

        $calamidade = Calamidade::find($id);

        return view('calamidades.update', compact(
            'calamidade',
        ));
    }

    public function save(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'date_start' => 'required',
                'status' => 'required',
                'tipo' => 'required',
            ]);
            
            $calamidade = Calamidade::find($request->route('id'));

            $calamidade->fill($request->all());

            $calamidade->save();
    
            return redirect(
                route('calamidades')
            );
        } catch (Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'date_start' => 'required',
                'tipo' => 'required'
            ]);
            
            $data = $request->only([
                'name',
                'description',
                'date_start',
                'tipo'
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
