<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    public $table = "project";
    protected $dateFormat = 'U';
    public $fillable = [
        'name','description','user_id'
    ];

    /**
     * @return HasMany
     */
    public function api():HasMany
    {
        return $this->hasMany(Api::class,'project_id','id');
    }
}
