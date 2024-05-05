<?php

namespace App\Livewire\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class BannerList extends Component
{
    use WithPagination;


    #[Computed()]
    public function banners()
    {
        $banners = Banner::orderBy('id', 'DESC')->paginate(3);
        return $banners;
    }

    public function render()
    {
        return view('livewire.banner.banner-list');
    }
}
