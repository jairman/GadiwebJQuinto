<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\User;


use Illuminate\Http\Request;
use App\Http\Requests;
use Spatie\Activitylog\Models\Activity;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

use Validator;

class UserController extends Controller
{

    public function index()
    {
        $this->authorize('index', User::class);
        $items = User::all()->sortByDesc('id');
        return view('panel.user.index', compact('items'));
    }

    public function create()
    {
        $this->authorize('create', User::class);
        //return view('panel.user.create');

        $roles = Role::get();
        //echo $roles;
        return view('panel.user.create', ['roles'=>$roles]);



    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', User::class);
        try {
            User::create($request->input());
        } catch (\Exception $e) {
            dd($e);
        }

        $roles = $request['roles']; //Retrieving the roles field

        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }        
        //Redirect to the users.index view and display message
        //return redirect()->route('users.index')->with('flash_message','User successfully added.');
        return redirect()->route('panel.user.index')->withSuccess(trans('app.success_store'));


        //return redirect()->route('panel.user.index')->with('success', 'Perfil criado com sucesso.');
    }

    public function show(User $registro)
    {
        //
    }

    public function edit(User $registro)
    {
        $user = $registro ?? auth()->user();
        $this->authorize('edit', $user);

        $roles = Role::get(); //Get all roles
        return view('panel.user.edit', compact('registro', 'roles'));


        


        //return view('users.edit', compact('user', 'roles')); //pass user and roles data to view

        //return view('admin.users.edit', compact('item', 'roles'));
    }

    public function update(UpdateRequest $request, User $registro)
    {
        $user = $registro ?? auth()->user();
        $this->authorize('edit', $user);
        try {
            $registro->update($request->input());
        } catch (\Exception $e) {
            dd($e);
        }


        $roles = $request['roles']; //Retreive all roles
        if (isset($roles)) {        
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        }        
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        if (auth()->user()->can('index', auth()->user())) {
            return redirect()->route('panel.user.index')
                ->with('success', 'Perfil atualizado com sucesso.');
        } else {
            return redirect()->route('panel.user.profile')
                ->with('success', 'Perfil atualizado com sucesso.');
        }



    }

    public function destroy(User $registro)
    {
        $this->authorize('destroy', User::class);
        try {
            $registro->delete();
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->route('panel.user.index')
            ->with('success', 'Perfil deletado com sucesso.');
    }

    public function selfUpdate()
    {
        $this->authorize('edit', auth()->user());
        $registro = auth()->user();
        return view('panel.user.edit', compact('registro'));
    }
}
