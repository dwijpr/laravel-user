<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


abstract class CRUDController extends Controller {

    public function __construct() {
        parent::__construct();
        view()->share(
            '___classAttrs'
            , $this->buildStruct()
        );
    }

    private function buildStruct() {
        $___vars = new \stdClass;
        $___vars->model = $this->model;
        $modelName = explode('\\', $this->model);
        $modelName = end($modelName);
        $___vars->single = strtolower($modelName);
        $___vars->plural = str_plural($___vars->single);
        $___vars->backend = 'dashboard/';
        $___vars->redirect = $___vars->backend.$___vars->plural;
        if (@$this->hasManyObjects()) {
            $___vars->hasMany = str_plural(strtolower($this->hasManyObjects()));
        }
        $___vars->viewOnly = @$this->viewOnly;
        $___vars->actionViewPath = 'crud.partials.action';
        return $this->___vars = $___vars;
    }

    public function index() {
        return view('crud.index', [
            'objects' =>
                $this->___vars->model::paginate(
                    config('app.values.pagination')
                ),
        ]);
    }

    public function view($id) {
        if($this->hasManyObjects()){
            view()->share(
                'hasManyObjects'
                , $this->hasManyObjectsAvailable()
            );
        }
        return view('crud.view', [
            'object' => $this->___vars->model::findOrFail($id)
        ]);
    }

    public function create() {
        if ($this->___vars->viewOnly) {
            abort(404);
        }
        if($this->hasManyObjects()){
            view()->share(
                'hasManyObjects'
                , $this->hasManyObjectsAvailable()
            );
        }
        return view('crud.create');
    }

    public function store() {
        if ($this->___vars->viewOnly) {
            abort(404);
        }
        $this->validate(request(), $this->validation());
        $this->___vars->model::create($this->data());
        return redirect($this->___vars->redirect);
    }

    public function destroy($id) {
        if ($this->___vars->viewOnly) {
            abort(404);
        }
        $this->___vars->model::findOrFail($id)->delete();
        return redirect($this->___vars->redirect);
    }

    public function edit($id) {
        if ($this->___vars->viewOnly) {
            abort(404);
        }
        if($this->hasManyObjects()){
            view()->share(
                'hasManyObjects'
                , $this->hasManyObjectsAvailable()
            );
        }
        return view('crud.edit', [
            'object' => $this->___vars->model::findOrFail($id),
        ]);
    }

    public function update($id) {
        if ($this->___vars->viewOnly) {
            abort(404);
        }
        $object = $this->___vars->model::findOrFail($id);
        $this->validate(
            request()
            , $this->validation($object->id)
        );
        $object->update($this->data(request()));
        return redirect($this->___vars->redirect);
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
