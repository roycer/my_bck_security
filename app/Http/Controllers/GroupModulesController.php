<?php namespace App\Http\Controllers;

use App\GroupModule;
use App\Group;
use App\Module;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GroupModulesController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function all(Request $request){

        $group_modules = GroupModule::with(['group','module'])->get()->toArray();

        return response()->json(['status' => 'success', 'result' => $group_modules]);

    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'id_groups' => 'required',
            'id_modules' => 'required',
            'view' => 'nullable',
            'create' => 'nullable',
            'update' => 'nullable',
            'delete' => 'nullable'
        ]);

        if(GroupModule::where('id_groups',$request->id_groups)->where('id_modules',$request->id_modules)->first()){
            $group = Group::where('id',$request->id_groups)->first();
            $module = Module::where('id',$request->id_modules)->first();
            return response()->json(['status' => 'fail','result' => 'Los permisos del grupo "'.$group->name.'" en el módulo "'.$module->name.'" ya fueron registrados.'],500);
        }

        $group_module = new GroupModule;
        $group_module->id_groups = $request->id_groups;
        $group_module->id_modules = $request->id_modules;
        $group_module->view = $request->view;
        $group_module->create = $request->create;
        $group_module->update = $request->update;
        $group_module->delete = $request->delete;

        if($group_module->save()){
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
            'id_groups' => 'required',
            'id_modules' => 'required',
            'view' => 'nullable',
            'create' => 'nullable',
            'update' => 'nullable',
            'delete' => 'nullable'
        ]);
        
        $group_module = GroupModule::find($id);
        $group_module->id_groups = $request->id_groups;
        $group_module->id_modules = $request->id_modules;
        $group_module->view = $request->view;
        $group_module->create = $request->create;
        $group_module->update = $request->update;
        $group_module->delete = $request->delete;

        if($group_module->save()){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

    public function remove($id){

        if($obj = GroupModule::destroy($id)){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

}
