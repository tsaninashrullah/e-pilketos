<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

use App\Models\Candidates;

use App\Http\Requests;

use App\Models\TypeUsers;

use App\Http\Requests\UsersRequest;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Activation, Validator, Redirect, Mail, Session, Hash;



class UsersController extends Controller
{
    /**
     *Return view to index
     */
    public function index()
    {
        $users = Users::where('type_id','=','3')->paginate(15);
        $user = Users::where('type_id', '=', '3')->get();
        return view('users.index')->with('users', $users)->with('user_s', $user);
    }

    public function indexPengawas()
    {
        $users = Users::where('type_id','!=','3')->paginate(15);
        $user = Users::where('type_id', '!=', '3')->get();
        return view('teachers.index')->with('users', $users)->with('user_s', $user);
    }

    /**
     *Return view to form create user
     */
    public function create()
    {
        $type = TypeUsers::all();
        return view('users.create')
            ->with('type', $type);
    }

    /**
     * Procces save data users
     */
    public function store(UsersRequest $request)
    {
        $credentials = [
            'nisn' => $request->nisn,
            'name' => $request->name,
            'gender' => $request->gender,
            'born' => $request->born_date,
            'address' => $request->address,
            'type_id' => $request->type,
            'status' => 0,
            'password' => $request->nisn,
        ];
        $user = Sentinel::registerAndActivate($credentials);
        $use = Users::where('nisn', '=', $request->nisn)->get();
        if ($request->type == "1") {
            $role = Sentinel::findRoleByName('admin');
            $role->users()->attach($use);
        }elseif ($request->type == "2") {
            $role = Sentinel::findRoleByName('teacher');
            $role->users()->attach($use);
        }else{
            $role = Sentinel::findRoleByName('user');
            $role->users()->attach($use);
        }
        Session::flash('message',$request->nisn.' your photo success to post');
        return redirect('users');
    }

    /**
     * Return view for detail user
     */
    public function show($id)
    {
        $users = Users::find($id);
        return view('users.show')->with('list_users',$users);
    }

    /**
     * Return view to form edit user
     */
    public function edit($id)
    {
        $users = Users::find($id);
        return view('users.edit')->with('list_users',$users);
    }

    /**
     * Procces update after edit data user
     */
    public function update(Request $request, $id)
    {
        $users = Users::find($id);
        $users->nisn = $request->nisn;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->born = $request->born_date;
        $users->address = $request->address;
        
        $users->save();

        Session::flash('message',$request->name.' your photo success to update');
        return redirect('users');
    }

    /**
     * Procces for delete user
     */
    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();
        $user = Users::all();
        Session::flash('message',$users->name.' your photo success to delete');
        return redirect('users')->with('users', $user);
    }

    // ------------------Aktivasi Tjoy-----------------------

    public function activeall()
    {
        ini_set('max_execution_time', 300);
        $users = Users::all();
        foreach ($users as $key) {
            $user = Sentinel::findById($key->id);
            $activation = Activation::create($user);
            $use = Users::find($key->id)->activation;
            $use['completed'] = '1';
            $use->save();
        }
        return redirect('users')
            ->with('users', $users);
    }

    public function home (){
    $candidates = Candidates::all();
    return view('welcome')->with('list_candidates',$candidates);
    }
}
