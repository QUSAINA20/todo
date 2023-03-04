<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Services\TodoService as ServicesTodoService;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(ServicesTodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index()
    {
        $todos = $this->todoService->all();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request, ServicesTodoService $service)
    {
        $data = $request->validated();
        $service->create($data);

        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }


    public function show($id)
    {
        $todo = $this->todoService->get($id);
        return view('todos.show', compact('todo'));
    }

    public function edit($id)
    {
        $todo = $this->todoService->get($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoRequest $request, ServicesTodoService $service, $id)
    {
        $data = $request->validated();
        $service->update($data, $id);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    public function destroy($id)
    {
        $this->todoService->delete($id);
        return redirect()->route('todos.index')->with('success', 'TODO deleted successfully.');
    }
}
