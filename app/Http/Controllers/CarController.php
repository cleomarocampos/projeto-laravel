<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CarService;

class CarController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected CarService $service
    )
    {
    }

    public function index()
    {
        return $this->service->all();
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
            'user_id' => 'nullable|numeric',
            'title' => 'required',
            'plat' => 'required',
            'model' => 'required',
            'year' => 'required',
        ]);

        $this->service->update($id, $request->all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'nullable|numeric',
            'title' => 'required',
            'plat' => 'required',
            'model' => 'required|digits:4|integer',
            'year' => 'required|digits:4|integer',
        ]);

        return $this->service->create($request->all());
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

}
