<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'name',
        'responsible',
        'email',
        'phone',
        'address',
        'obs'
    ];

    public function projects()
    {
        return $this->hasMany('CodeProject\Entities\Project');
    }
}
