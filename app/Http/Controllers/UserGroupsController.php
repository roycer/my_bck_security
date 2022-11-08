<?php namespace App\Http\Controllers;

use App\UserGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserGroupsController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function all(Request $request){

        $usergroups = UserGroup::get()->toArray();

        return response()->json(['status' => 'success', 'result' => $usergroups]);

    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'role_users.*.id' => 'nullable',
            'role_users.*.id_users' => 'required',
            'role_users.*.id_groups' => 'required',
        ]);

        $users = [];
        foreach($request->role_users as $user){
            array_push($users, $user['id_users']);
        }

        if(count($users) > count(array_unique($users))){
            return response()->json(['status' => 'fail','result' => 'No puede registrar un usuario repetido'],500);
        }

        foreach($request->role_users as $group_user){
            $group_user_update = UserGroup::where('id', $group_user['id'])->first();

            if($group_user_update){
                $group_user_update->id_users = $group_user['id_users'];
                $group_user_update->id_groups = $group_user['id_groups'];
                $group_user_update->save();
            }
            else{
                $new_group_user = new UserGroup;
                $new_group_user->id_users = $group_user['id_users'];
                $new_group_user->id_groups = $group_user['id_groups'];
                $new_group_user->save();
            }
        }

        return response()->json(['status' => 'success','result' => []]);

    }

    public function get($id, Request $request){

        return response()->json(['status' => 'success','result' => null]);

    }

    public function put(Request $request,$id){

        return response()->json(['status' => 'success','result' => null]);

    }

    public function remove($id){

        if($obj = UserGroup::destroy($id)){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

}
