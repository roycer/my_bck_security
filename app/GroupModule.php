<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupModule extends Model {

    use SoftDeletes;

    protected $table = 'groups_modules';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function group(){
        return $this->belongsTo('App\Group','id_groups');
    }

    public function module(){
        return $this->belongsTo('App\Module','id_modules');
    }

}
