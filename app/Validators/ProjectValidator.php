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
        'name'        => 'required',
        'progress'    => 'required',
        'status'      => 'required',
        'due_date'    => 'required'
    ];
}

