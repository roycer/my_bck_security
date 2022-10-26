<?php namespace App\Http\Controllers;

use App\Module;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModulesController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function all(Request $request){

        $modules = Module::get()->toArray();

        return response()->json(['status' => 'success', 'result' => $modules]);

    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        if(Module::where('name',strtoupper(''.$request->name))->first()){
            return response()->json([
                'status' =>'fail',
                'result' => null
            ]);
        }

        $module = new Module;
        $module->name = strtoupper(''.$request->name);

        if($module->save()){
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

        $module = Module::find($id);
        $module->name = strtoupper(''.$request->name);

        if($module->save()){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

    public function remove($id){

        if($obj = Module::destroy($id)){
            return response()->json(['status'=>'success']);
        }

        return response()->json(['status'=>'failed']);

    }

}
