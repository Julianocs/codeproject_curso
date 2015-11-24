<?php
/**
 * Created by PhpStorm.
 * User: Juliano
 * Date: 23/09/2015
 * Time: 10:12
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ClienteRepository;
use CodeProject\Validators\ClienteValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;


class ClienteService
{
    /**
     * @var ClienteRepository
     */
    protected $repository;

    /**
     * @var ClienteValidator
     */
    protected $validator;

    public function __construct(ClienteRepository $repository, ClienteValidator $validator )
    {
        $this->repository = $repository;
        $this->validator = $validator;

    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();

            return $this->repository->create($data);

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' =>$e->getMessageBag()
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
                'message' => 'Cliente não encontrado'
            ];
        }
    }

    public function show($id){
        try{
            return [
                "success" => $this->repository->find($id)
            ];
        } catch(ModelNotFoundException $e) {
            return [
                "success" => false,
                "message" => "Cliente ID: {$id} inexistente!"
            ];
        }
    }

    public function destroy($id)
    {
        try {
            if ($this->repository->find($id)->destroy()) {
                return [
                    'error'   => false,
                    'message' => 'Cliente deletado.'
                ];
            }
        } catch (ModelNotFoundException $e) {
            return [
                'error'   => true,
                'message' => 'Cliente não encontrado.'
            ];
        }
    }



}