<?php
/**
 * Created by PhpStorm.
 * User: Juliano
 * Date: 22/09/2015
 * Time: 18:00
 */

namespace CodeProject\Repositories;


use CodeProject\Entities\Clientes;
use Prettus\Repository\Eloquent\BaseRepository;

class ClienteRepositoryEloquent extends BaseRepository implements ClienteRepository
{
    public function model()
    {
        return Clientes::class;

    }
}