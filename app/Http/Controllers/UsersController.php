<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function modules(Request $request){

        $user = User::where('id',$request->user()->id)->with(['groups','groups.group','groups.group.modules'])->get()->first();
        return response()->json(['status' => 'success','result' => $user]);

    }

    public function password(Request $request){

        $this->validate($request, [
            'password' => 'required'
        ]);

        $user = User::find($request->user()->id);

        if($user){
            $user->password =  Hash::make($request->password);
            if($user->save()){
                return response()->json(['status' => 'success','result' => '']);
            }

        }

        return response()->json(['status' => 'fail','result' => '']);

    }

    public function all(Request $request){
    }

    public function add(Request $request){
    }

    public function get($id){
    }

    public function put(Request $request,$id){
    }

    public function remove($id){
    }
}
