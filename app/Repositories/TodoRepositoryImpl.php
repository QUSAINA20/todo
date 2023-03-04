<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Repositories\TodoRepository;

class TodoRepositoryImpl implements TodoRepository
{
    public function all()
    {
        return Todo::all();
    }

    public function get($id)
    {
        return Todo::find($id);
    }

    public function create(array $data)
    {
        return Todo::create($data);
    }

    public function update(array $data, $id)
    {
        $todo = Todo::find($id);
        return $todo->update($data);
    }

    public function delete($id)
    {
        return Todo::destroy($id);
    }
}
