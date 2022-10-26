<?php namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\UserGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GroupsController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function all(Request $request){

        $groups = Group::get();
        foreach($groups as $group){
            $group['users'] = UserGroup::where('id_groups',$group['id'])->with(['user'])->get();
        }

        return response()->json(['status' => 'success', 'result' => $groups]);

    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        if(Group::where('name',strtoupper(''.$request->name))->first()){
            return response()->json([
                'status' =>'fail',
                'result' => null
            ]);
        }

        $group = new Group;
        $group->name = strtoupper(''.$request->name);

        if($group->save()){
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

    public function get($id, Request $request){
        return response()->json(['status' => 'success','result' => null]);
    }

    public function put(Request $request,$id){

        $this->validate($request,[
            'name' => 'required',
        ]);

        $group = Group::find($id);
        $group->name = strtoupper(''.$request->name);

        if($group->save()){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

    public function remove($id){

        if($obj = Group::destroy($id)){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

}
