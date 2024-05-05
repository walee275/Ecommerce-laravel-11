<?php

namespace App\Livewire\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class BannerTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $status = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    #[Url()]
    public $perPage = 5;


    public function updatedSearch()
    {
        $this->resetPage();
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
        return view(
            'livewire.banner.banner-table',
            [
                'banners' => Banner::search($this->search)
                    ->when($this->status !== '', function ($query) {
                        $query->where('status', $this->status);
                    })
                    ->orderBy($this->sortBy, $this->sortDir)
                    ->paginate($this->perPage)

            ]
        );
    }
}
