<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


abstract class CRUDController extends Controller {

    public function __construct(
        $model
        , $backend = "dashboard/"
        , $view = "objects"
    ) {
        $this->struct = new \stdClass;
        $this->struct->model = 'App\\'.$model;
        $this->struct->single = strtolower($model);
        $this->struct->plural = str_plural($this->struct->single);
        $this->struct->backend = $backend;
        $this->struct->view = $view;
        $this->struct->viewPath = $this->struct->view
            .'.'.$this->struct->plural;
        $this->struct->redirect = $this->struct->backend
            .$this->struct->plural;
    }

    public function index() {
        $class = $this->struct->model;
        $objects = $class::all();
        return view('crud.index', [
            'objects' => $objects,
            'class' => $class,
            'classAttrs' => $this->struct,
        ]);
    }

    public function create() {
        return view('crud.create');
    }

    public function store(Request $request) {
        $class = $this->struct->model;
        $this->validate($request, $this->validation());
        $class::create($this->data($request));
        return redirect($this->struct->redirect);
    }

    public function destroy($id) {
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        $object->delete();
        return redirect($this->struct->redirect);
    }

    public function edit($id) {
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        return view($this->struct->viewPath.'.edit', [
            'object' => $object,
        ]);
    }

    public function update(Request $request, $id) {
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        $this->validate($request, $this->validation($object->id));
        $object->update($this->data($request));
        return redirect($this->struct->redirect);
    }

    protected abstract function validation($id = false);
    protected abstract function data(Request $request);

}
