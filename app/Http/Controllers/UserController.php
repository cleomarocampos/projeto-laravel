<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UserService;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected UserService $service
    )
    {
    }

    public function index()
    {
        return $this->service->findAll();
    }

    public function trash()
    {
        return $this->service->findAllTrash();
    }

    public function trashRestore($id)
    {
        return $this->service->trashRestore($id);
    }

    public function trashDelete($id)
    {
        return $this->service->trashDelete($id);
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'required',
        ]);

        $this->service->update($id, $request->all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'required',
        ]);

        return $this->service->create($request->all());
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

}
