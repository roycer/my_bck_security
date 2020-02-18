<?php namespace App\Http\Controllers;
use App\Weight;
use Illuminate\Http\Request;
use Log;

class WeightsController extends Controller {

    const MODEL = "App\Weights";

    public function __construct(){
    }

    public function all(Request $request){
        return response()->json(['status' => 'recibido']);
    }

    public function add(Request $request){

        $this->validate($request,[
            'code' => 'required',
            'nro' => 'required',
            'weight' => 'required'
        ]);

        $current_userid = $request->user()->id;
        $weight = new Weight();

        $weight->code = $request->code;
        $weight->nro = $request->nro;
        $weight->weight = $request->weight;

        if($request->has('unit')){
            $weight->unit = $request->unit;
        }

        if($request->has('observation')){
            $weight->observation = $request->observation;
        }

        $weight->id_user = $current_userid;

        if($weight->save()){

            return response()->json([
                'status' => 'success',
                'result' => null
            ]);

        }

        return response()->json([
            'status' =>'fail',
            'result' => null
        ]);

    }

    public function remove($id){

        if(Weight::destroy($id)){

            return response()->json([
                'status' => 'success',
                'result' => null
            ]);

        }

        return response()->json([
            'status' => 'failed',
            'result' => null
        ]);

    }
}
