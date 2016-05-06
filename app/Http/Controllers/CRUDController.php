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
        $this->struct = $this->buildStruct($model, $backend, $view);
    }

    private function buildStruct($model, $backend, $view) {
        $struct = new \stdClass;
        $struct->model = 'App\\'.$model;
        $struct->single = strtolower($model);
        $struct->plural = str_plural($struct->single);
        $struct->backend = $backend;
        $struct->view = $view;
        $struct->viewPath = $struct->view.'.'.$struct->plural;
        $struct->redirect = $struct->backend.$struct->plural;
        if (@$this->hasManyObjects()) {
            $struct->hasMany = str_plural(strtolower($this->hasManyObjects()));
        }
        $struct->viewOnly = @$this->viewOnly;
        $struct->actionViewPath = 'crud.partials.action';
        return $struct;

    }

    public function index() {
        $class = $this->struct->model;
        $objects = $class::paginate(config('app.values.pagination'));
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
            $data['hasManyObjects'] = $this->hasManyObjectsAvailable();
        }
        return view('crud.view', $data);
    }

    public function create() {
        if ($this->struct->viewOnly) {
            abort(404);
        }
        $class = $this->struct->model;
        $data = [
            'class' => $class,
            'classAttrs' => $this->struct,
        ];
        if($this->hasManyObjects()){
            $data['hasManyObjects'] = $this->hasManyObjectsAvailable();
        }
        return view('crud.create', $data);
    }

    public function store() {
        if ($this->struct->viewOnly) {
            abort(404);
        }
        $class = $this->struct->model;
        $this->validate(request(), $this->validation());
        $class::create($this->data());
        return redirect($this->struct->redirect);
    }

    public function destroy($id) {
        if ($this->struct->viewOnly) {
            abort(404);
        }
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        $object->delete();
        return redirect($this->struct->redirect);
    }

    public function edit($id) {
        if ($this->struct->viewOnly) {
            abort(404);
        }
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        $data = [
            'object' => $object,
            'class' => $class,
            'classAttrs' => $this->struct,
        ];
        if($this->hasManyObjects()){
            $data['hasManyObjects'] = $this->hasManyObjectsAvailable();
        }
        return view('crud.edit', $data);
    }

    public function update($id) {
        if ($this->struct->viewOnly) {
            abort(404);
        }
        $class = $this->struct->model;
        $object = $class::findOrFail($id);
        $this->validate(request(), $this->validation($object->id));
        $object->update($this->data(request()));
        return redirect($this->struct->redirect);
    }

    protected abstract function validation($id = false);
    protected abstract function data();

    protected function hasManyObjects() {
        return false;
    }

    protected function hasManyObjectsAvailable() {
        $hasManyObjects = 'App\\'.$this->hasManyObjects();
        return $hasManyObjects::all();
    }
}
