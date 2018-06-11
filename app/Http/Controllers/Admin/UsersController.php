<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class UsersController extends Controller
{
	  public function index(){
	    $users = User::paginate(15);
	    return view('admin.users.index', compact('users'));
	  }

	  public function create(){
		  $this->authorize('view-enrollment');
	  	return view('admin.users.create');
	  }

	  public function edit($id){
		  if(\Gate::denies('view-enrollment')){
			  abort(403,'Não autorizado');
		  }

		  $users = User::findOrFail($id);
		  return view('admin.users.edit', compact('users'));
	  }

	  public function update($id, Request $request){

		  $this->authorize('view-enrollment');
		  $validation = $this->validation($request->all());

		  if($validation->fails()){
			  return redirect()
				  ->back()
				  ->withErrors($validation->errors())
				  ->withInput($request->all());
		  }

		  $users = User::findOrFail($id);
		  $users->updata($request, $id);
		  return redirect()->route('users.index')->with('status', 'Registro alterado!');
	  }

	  public function destroy(Request $request){
		  $this->authorize('view-enrollment');
		  $subject = User::findOrFail($request->category_id);
		  $subject->delete();
		  return back()->with('status', 'Registro apagado!');
	  }


	  public function store(Request $request){
		  $this->authorize('view-enrollment');
		  $validation = $this->validation($request->all());

		  if($request->password!=$request->pass2){
			  return redirect()->back()
			                   ->withErrors($validation->errors())
			                   ->withInput($request->all())
			                   ->with('status', 'Senhas não conferem!');
		  }
		  if($validation->fails()){
			  return redirect()
				  ->back()
				  ->withErrors($validation->errors())
				  ->withInput($request->all());
		  }
		  User::inserting($request);
		  return redirect()->route('users.index')->with('status', 'Registro inserido!');
	  }

	private function validation($data){

		$rules = [
			'name' =>'required|min:6',
			'cpf' =>'required',
			'email' =>'required',
			'password' =>'required|min:6',
			'pass2' =>'required|min:6',
			'access' =>'required',
		];
		$mensagens = [
			'name.required'=>'Campo nome é obrigatório',
			'cpf.required'=>'Campo carga horária é obrigatório',
			'email.required'=>'Campo email é obrigatório',
			'password.required'=>'Insira a senha',
			'pass2.required'=>'Confirme a senha',
			'access.required'=>'Selecione o perfil',

		];
		return \Validator::make($data,$rules,$mensagens);
	}

	public function search(Request $request){
		$subjects = User::search($request->table_search);
		return view('admin.subjects.index',compact('subjects'));
	}

	public function myProfile(){
	  	return view('admin.users.myProfile');
	}

	public function editProfile(Request $request){
		$this->authorize('view-enrollment');
		$user= $request->all();

		$validation = $this->validation($request->all());

		if($user!= null){
			if($request->password!=$request->pass2){
				return redirect()->back()
								 ->withErrors($validation->errors())
								 ->withInput($request->all('name','email','cpf'))
				                 ->with('status', 'Senhas não conferem!');
			}
			$user['password']=Hash::make($request->password);
		}

		$update = auth()->user()->update($user);

		if($update)
			return redirect()
				       ->route('dashboard')
			       ->with('status', 'Usuário alterado com sucesso!');
			return redirect()
				       ->route('myProfile')
			       ->with('status', 'Error ao alterar!');


	}

}
