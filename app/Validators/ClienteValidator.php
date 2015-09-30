<?php
/**
 * Created by PhpStorm.
 * User: Juliano
 * Date: 23/09/2015
 * Time: 10:34
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;


class ClienteValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address'=> 'required'
    ];
}