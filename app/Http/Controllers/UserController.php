<?php

namespace App\Http\Controllers;

use App\Exceptions\UserControllerException;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\Team;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function index(Request $request)
    {
        $users = $this->model->getUsers(
            $request->search ?? ''
        );
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        
        // $user = User::find($id);
        // if(!$users = User::find($id)){
        //     return redirect()->route('users.index');
        // }
        $user = User::find($id);
        if($user){
            return view('users.show', compact('user'));
        }else {
            throw new UserControllerException('User não encontrado');
        }
        // $team = Team::find($id);
        // $team->load('users');

        // return view('users.show', compact('users'));
    }

    public function create() 
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if($request->image){
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }
        
        $this->model->create($data);

        return redirect()->route('users.index')->with('success', 'Usuario cadastrado com sucesso!');
    }

    public function edit($id) 
    {
        if(!$user = $this->model->find($id)){
            return redirect()->route('users.index');
        }
        return view('users.edit',[
           'user' => $user
        ]);
    }

    public function update(StoreUpdateUserFormRequest $request, $id) 
    {
        if(!$user = $this->model->find($id)){
            return redirect()->route('users.index');
        }

        $data = $request->only('name', 'email');
        if($request->input('password')){
            $data['password'] = bcrypt($request->password);
        }
        $data['is_admin'] == $request->is_admin ? 1 : 0;
        $user->update($data);

        return redirect()->route('users.index')->with('edit', 'Usuario editado com sucesso!');
    }

    public function destroy($id) 
    {
        if(!$user = $this->model->find($id)){
            return redirect()->route('users.index');
        }
        
        $user->delete();

        return redirect()->route('users.index')->with('delete', 'Usuario deletado com sucesso!');
    }

    public function admin() 
    {
        return view('admin.index');
    }
}
