<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weight extends Model {

    use SoftDeletes;

    protected $table = 'weights';

    protected $fillable = [];

    protected $hidden = ['created_at','deleted_at'];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

}
