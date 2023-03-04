<?php

namespace App\Services;

interface TodoService
{
    public function all(): array;

    public function create(array $data): bool;

    public function update(array $data, int $id): bool;


    public function delete($id): bool;

    public function get($id): ?array;
}
