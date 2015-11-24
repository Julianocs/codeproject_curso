<?php
/**
 * Created by PhpStorm.
 * User: Juliano
 * Date: 29/09/2015
 * Time: 10:27
 */

namespace CodeProject\Services;



use CodeProject\Repositories\ProjectNoteRepository;

use CodeProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{
    /**
     * @var ProjectNoteRepository
     */
    protected $repository;
    /**
     * @var ProjectNoteValidator
     */
    protected $validator;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;}

    public function create(array $data)
    {
        try{

            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        } catch(ValidatorException $e) {

            return[
                'error'   => true,
                'message' => $e->getMessageBag()
            ];

        }

    }


    public function update(array $data,$id)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data,$id);


        }catch (ValidatorException $e){
            return [
                'error'=> true,
                'message' => $e->getMessageBag()
            ];
        }catch(ModelNotFoundException $e){
            return [
                'error'=> true,
                'message' => 'Project Note não encontrado'
            ];
        }
    }

    public function delete($id)
    {
        try {
            if ($this->repository->find($id)->delete()) {
                return [
                    'error'   => false,
                    'message' => 'Projeto deletado.'
                ];
            }
        } catch (ModelNotFoundException $e) {
            return [
                'error'   => true,
                'message' => 'Projeto não encontrado.'
            ];
        }
    }

}