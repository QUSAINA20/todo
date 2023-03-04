<?php

namespace App\Services;

use App\Repositories\TodoRepository;
use App\Services\TodoService as ServicesTodoService;


class TodoServiceImpl implements ServicesTodoService
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function all(): array
    {
        return $this->todoRepository->all()->toArray();
    }

    public function get($id): ?array
    {
        return $this->todoRepository->get($id)->toArray();
    }

    public function create(array $data): bool
    {
        $todo = $this->todoRepository->create($data);

        return !is_null($todo);
    }

    public function update(array $data, int $id): bool
    {
        $todo = $this->todoRepository->get($id);

        if (!$todo) {
            return false;
        }

        return $this->todoRepository->update($data, $id);
    }

    public function delete($id): bool
    {
        return $this->todoRepository->delete($id);
    }
}
