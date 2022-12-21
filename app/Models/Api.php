<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Api extends Model
{
    public $table = "api";
    protected $dateFormat = 'U';
    protected $fillable = [
        'name',
        'url',
        'user_id',
        'p_id',
        'project_id',
        'type',
        'params',
        'body',
        'header',
        'method'
    ];

    public function params(): Attribute
    {
        return Attribute::make( get: function ($value) {
            return json_decode( $value,true);
        }, set: function ($value=[]) {
            return json_encode( $value??[],JSON_UNESCAPED_UNICODE);
        } );
    }
    public function body(): Attribute
    {
        return Attribute::make( get: function ($value) {
            return json_decode( $value,true);
        }, set: function ($value=[]) {
            return json_encode( $value??[],JSON_UNESCAPED_UNICODE);
        } );
    }
    public function header(): Attribute
    {
        return Attribute::make( get: function ($value) {
            return json_decode( $value,true);
        }, set: function ($value=[]) {
            return json_encode( $value??[],JSON_UNESCAPED_UNICODE);
        } );
    }

}
