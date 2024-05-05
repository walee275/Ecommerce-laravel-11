<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Datatable extends Component
{

    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $admin = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 5;

    public $searchableFields = [];
    public $fieldsToDisplay = [];

    // Model class name
    public $model;

    public function mount($data = [])
    {
        $this->model = $data['model'];
        $this->searchableFields = $data['searchableFields'];
        $this->fieldsToDisplay = $data['fieldsToDisplay'];

        $modelClass = 'app\\Models\\' . $this->model;
        $modelInstance = new $modelClass();

        // Get the fillable attributes of the model
        $fillables = $modelInstance->getFillable();
        $searchableFields = array_intersect($this->searchableFields, $fillables);
        if(count($searchableFields)){
            $this->searchableFields = $searchableFields;
        }


        dd($this->searchableFields);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        // Find the model by id and delete it
        $modelClass = $this->model;
        $modelInstance = $modelClass::findOrFail($id);
        $modelInstance->delete();
    }

    public function setSortBy($sortByField)
    {

        if ($this->sortBy === $sortByField) {
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        // dd($this->model->getFillable());

        $modelClass = $this->model;
        // $records = $modelClass::where()

        return view('livewire.datatable');
    }
}
