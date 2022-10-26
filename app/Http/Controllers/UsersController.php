<?php namespace App\Http\Controllers;

use Validator;
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

        $users = User::get()->toArray();

        return response()->json(['status' => 'success', 'result' => $users]);
    }

    public function add(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'password' => 'required|same:validated_password'
        ]);

        if($validator->fails()) {
            if($validator->errors()->first('username')){
                return response()->json([
                    'status' => 'fail',
                    'result' => 'Nombre de usuario ya registrado'
                ],500);
            }
            if($validator->errors()->first('password')){
                return response()->json([
                    'status' => 'fail',
                    'result' => 'Las contraseñas ingresadas no coinciden'
                ],500);
            }
        }

        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        if($user->save()){
            return response()->json([
                'status' =>'success',
                'result' => null
            ]);

        }

        return response()->json([
            'status' =>'fail',
            'result' => null
        ]);

    }

    public function get($id){
    }

    public function put(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username,'.$id,
            'password' => 'same:validated_password'
        ]);

        if($validator->fails()) {
            if($validator->errors()->first('username')){
                return response()->json([
                    'status' => 'fail',
                    'result' => 'Nombre de usuario ya registrado'
                ],500);
            }
            if($validator->errors()->first('password')){
                return response()->json([
                    'status' => 'fail',
                    'result' => 'Las contraseñas ingresadas no coinciden'
                ],500);
            }
        }

        $user = User::find($id);
        $user->username = $request->username;
        if($request->password){
            $user->password = Hash::make($request->password);
        }

        if($user->save()){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

    public function remove($id){

        if($obj = User::destroy($id)){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }
}
