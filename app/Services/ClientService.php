<?php

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{

    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $repository
     * @param UserRepository $userRepository
     */
    public function __construct(ClientRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function save(array $data,$id)
    {
        $this->repository->update($data,$id);
        $userId = $this->repository->find($id, ['user_id'])->user_id;

        $this->userRepository->update($data['user'],$userId);
    }
}