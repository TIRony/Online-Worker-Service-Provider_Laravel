<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    //
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facdes\DB;
use Validator;
use App\Http\Requests\UserRequest;//for validation through UserRequest

class HomeController extends Controller
{

    public function index(Request $req){
        return view('home.index');
    }

    public function show($id){
        $s = User::find($id);
        return view('home.show', $s);
    }

    public function add(){
        return view('home.add');
    }

    public function create(UserRequest $req){


        if($req->hasFile('pic')){
            $file = $req->file('pic');

            echo "File Name: ".$file->getClientOriginalName()."<br>";
            echo "File Extension: ".$file->getClientOriginalExtension()."<br>";
            echo "File Size: ".$file->getSize()."<br>";
            echo "File Mime Type: ".$file->getMimeType();

            if($file->move('upload', $file->getClientOriginalName())){
                echo "<h2>Success</h2>";
            }else{
                echo "<h2>Error</h2>";
            }
        }


        $req->validate([
            'username'=>'bail|required|min:4|unique:users',
            'password'=>'required',
            'cgpa'=>'required',
            'name'=>'required|email'
        ]);

    
        $validation = $this->validate($req, [
            'username'=>'required',
            'password'=>'required',
            'cgpa'=>'required',
            'name'=>'required'
        ])->validate();

        $validation->validate();

        $validation = Validator::make($req->all(), [
            'username'=>'required',
            'password'=>'required',
            'cgpa'=>'required',
            'name'=>'required'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
            return redirect()->route('home.add')
                            ->with('errors', $validation->errors())
                            ->withInput();
        }*/


        $user = new User();
        $user->username = $req->username;
        $user->password = $req->password;
        $user->name     = $req->name;
        $user->cgpa     = $req->cgpa;
        $user->dept     = $req->dept;
        $user->type     = $req->type;
        
        if($user->save()){
            return redirect()->route('home.list');
        }else{
            return redirect()->route('home.add');
        }
    }

    public function edit($id){
        $user = User::find($id);
        return view('home.edit', $user);
    }

    public function update($id, Request $req){

        $user = User::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->name     = $req->name;
        $user->cgpa     = $req->cgpa;
        $user->dept     = $req->dept;
        $user->type     = $req->type;

        if($user->save()){
            return redirect()->route('home.list');
        }else{
            return redirect()->route('home.edit', $id);
        }
    }

    public function delete($id){
        $user = User::find($id);
        return view('home.delete', $user);
    }

    public function destroy($id, Request $req){
        if(User::destroy($req->userId)){
            return redirect()->route('home.list');
        }else{
            return redirect()->route('home.delete', $id);
        }
    }

    public function list(){
        $users = User::all();
        return view('home.view_users', ['std'=>$users]);
    }
}
