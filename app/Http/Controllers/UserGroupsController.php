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
            'groupUsers.*.id' => 'nullable',
            'groupUsers.*.id_users' => 'required',
            'groupUsers.*.id_groups' => 'required',
        ]);

        foreach($request->groupUsers as $group_user){
            $group_user_update = UserGroup::where('id', $group_user['id'])->first();

            if($group_user_update){
                $group_user_update->id_users = $group_user['id_users'];
                $group_user_update->id_groups = $group_user['id_groups'];
                $group_user_update->save();
            }
            else{
                if(UserGroup::where('id_users',$group_user['id_users'])->where('id_groups',$group_user['id_groups'])->first()){
                    return response()->json(['status' => 'fail','result' => 'El usuario ya fue registrado en este grupo'],500);
                }
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
