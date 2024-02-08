<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupModule extends Model {

    use SoftDeletes;

    protected $table = 'groups_modules';

    protected $fillable = [];

    protected $dates = [];

    protected $casts = [
        'id' => 'integer',
        'sec_create' => 'boolean',
        'sec_view' => 'boolean',
        'sec_update' => 'boolean',
        'sec_delete' => 'boolean',
        'id_groups' => 'integer',
        'id_modules' => 'integer',
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

    public function module(){
        return $this->belongsTo('App\Module','id_modules');
    }

}
