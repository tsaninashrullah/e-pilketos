<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cartalyst\Sentinel\Users\UserInterface;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Cartalyst\Sentinel\Activations\EloquentActivation;

use App\Http\Requests;

use App\Models\Users;

use Activations, Session;

class AuthenticateController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {

        $credentials = [
            'login'    => $request->nisn,
            'password' => $request->password,
        ];
        Sentinel::check();
        if ($user = Sentinel::authenticate($credentials))
        {
            if(Sentinel::getUser()->status == 1 ) {
                Sentinel::logout();
                return redirect('/');
            }elseif(Sentinel::inRole('admin') || Sentinel::inRole('teacher')){
                return redirect('dashboard');
            }else{
                return redirect('votes');
            }
        }
        else
        {
            Session::flash('notice', 'Failed to login');
            return redirect('login');
            // Authentication failed.
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/')->with('status', 'Terimakasih telah berpartisipasi dalam pemilihan ketua OSIS |^_^|');
    }
}
