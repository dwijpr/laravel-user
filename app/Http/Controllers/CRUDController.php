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
        parent::__construct();
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
        if (@$this->hasManyObjects()) {
            $this->struct->hasMany = str_plural(
                strtolower($this->hasManyObjects())
            );
        }
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

    public function view($id) {
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        $data = [
            'object' => $object,
            'class' => $class,
            'classAttrs' => $this->struct,
        ];
        if($this->hasManyObjects()){
            $hasManyObjects = 'App\\'.$this->hasManyObjects();
            $data['hasManyObjects'] = $hasManyObjects::all();
        }
        return view('crud.view', $data);
    }

    public function create() {
        $class = $this->struct->model;
        $data = [
            'class' => $class,
            'classAttrs' => $this->struct,
        ];
        if($this->hasManyObjects()){
            $hasManyObjects = 'App\\'.$this->hasManyObjects();
            $data['hasManyObjects'] = $hasManyObjects::all();
        }
        return view('crud.create', $data);
    }

    public function store() {
        $class = $this->struct->model;
        $this->validate(request(), $this->validation());
        $class::create($this->data());
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
        $data = [
            'object' => $object,
            'class' => $class,
            'classAttrs' => $this->struct,
        ];
        if($this->hasManyObjects()){
            $hasManyObjects = 'App\\'.$this->hasManyObjects();
            $data['hasManyObjects'] = $hasManyObjects::all();
        }
        return view('crud.edit', $data);
    }

    public function update($id) {
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        $this->validate(request(), $this->validation($object->id));
        $object->update($this->data(request()));
        return redirect($this->struct->redirect);
    }

    protected abstract function validation($id = false);
    protected abstract function data();

    protected function hasManyObjects(){
        return false;
    }
}
