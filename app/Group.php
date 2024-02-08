<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model {

    use SoftDeletes;

    protected $table = 'groups';

    protected $fillable = [];

    protected $dates = [];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function modules(){
        return $this->hasMany('App\GroupModule','id_groups');
    }
}
