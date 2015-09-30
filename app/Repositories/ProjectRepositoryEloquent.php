<?php
/**
 * Created by PhpStorm.
 * User: Juliano
 * Date: 29/09/2015
 * Time: 09:19
 */

namespace CodeProject\Repositories;

use CodeProject\Entities\Project;
use Prettus\Repository\Eloquent\BaseRepository;


class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }

}