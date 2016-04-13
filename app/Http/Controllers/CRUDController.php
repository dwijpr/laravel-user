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
        $this->struct->_model = strtolower($model);
        $this->struct->tableName = str_plural($this->struct->_model);
        $this->struct->backend = $backend;
        $this->struct->view = $view;
        $this->struct->viewPath = $this->struct->view
            .'.'.$this->struct->tableName;
        $this->struct->redirect = $this->struct->backend
            .$this->struct->tableName;
    }

    public function index() {
        $class = $this->struct->model;
        $objects = $class::all();
        return view($this->struct->viewPath.'.index', [
            'objects' => $objects,
        ]);
    }

    public function create() {
        return view($this->struct->viewPath.'.create');
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
