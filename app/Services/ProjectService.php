<?php
/**
 * Created by PhpStorm.
 * User: Juliano
 * Date: 29/09/2015
 * Time: 10:27
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    protected $repository;
    /**
     * @var ProjectValidator
     */
    protected $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
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
                'message' => 'Projeto não encontrado'
            ];
        }
    }


    public function show($id){
        try{
            return [
                "success" => $this->repository->with(['owner', 'client'])->find($id)
            ];
        } catch(ModelNotFoundException $e) {
            return [
                "success" => false,
                "message" => "Projeto ID: {$id} inexistente!"
            ];
        }
    }

    public function destroy($id)
    {
        try {
            if ($this->repository->find($id)->destroy()) {
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
        } catch(\PDOException $e){
            return [
                'success' => false,
                'message' => 'Existem projetos cadastrados a este cliente!',
            ];
        }
    }


}