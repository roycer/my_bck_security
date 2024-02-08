<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model {

    use SoftDeletes;

    protected $table = 'users_groups';

    protected $fillable = [];

    protected $dates = [];

    protected $casts = [
        'id' => 'integer',
        'id_groups' => 'integer',
        'id_users' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function group(){
        return $this->belongsTo('App\Group','id_groups');
    }

    public function user(){
        return $this->belongsTo('App\User','id_users');
    }
}
