<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Throwable;

use function PHPSTORM_META\type;

class NewUserRegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register.form');
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'sure_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);
    
            $user = new User([
                'name' => sprintf('%s %s', $request->post('name'), $request->post('sure_name')),
                'email' => $request->post('email'),
                'is_admin' => false,
                'password' => Hash::make($request->post('password')),
            ]);
    
            $user->save();
    
            return redirect(route('home'));
        } catch (Throwable $th) {
            dd($th);
        }
        
    }
}
