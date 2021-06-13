<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::whenSearch(request()->search)
            ->paginate(5);
        return view('dashboard.users.index', compact('users'));
    }

    public function create(){

        return view('dashboard.users.create');
    }

    public function store(UserRequest $request){

        $user = User::create($request->all());
        session()->flash('success','User added successfully');
        return redirect()->route('dashboard.users.index');

    }

    public  function edit(User $user){

        return view('dashboard.users.edit',compact('user'));
    }

    public function update(UserRequest $request,User $user){

        $user->update($request->all());

        session()->flash('success','User updated successfully');
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user){
        $user->delete();
        session()->flash('success','User deleted successfully');
        return redirect()->route('dashboard.users.index');

    }
}
