<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slavery extends Model
{
    protected $table = 'slaveries';
    protected $fillable = [
        'first_name',
        'last_name',    
        'username',
        // 'api_token',
    ];
    /*}    $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('description')->nullable()->default('no hay descripcion');
    
    */
}
