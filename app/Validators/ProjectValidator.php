<?php
/**
 * Created by PhpStorm.
 * User: Juliano
 * Date: 29/09/2015
 * Time: 10:36
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id'    => 'required|integer',
        'client_id'   => 'required|integer',
        'name'        => 'required|max:120',
        'description' => 'max:2500',
        'progress'    => 'required|max:200',
        'status'      => 'required|max:2',
        'due_date'    => 'required|date'
    ];
}

