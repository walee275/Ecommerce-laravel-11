<?php

namespace App\Livewire\Banner;

use App\Models\Banner;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateBanner extends Component
{
    public $title, $description, $photo;
    public $status = '';
    public $banner;


    public function mount(Banner $banner = null)
    {
        if ($banner) {
            $this->banner = $banner;
            $this->title = $banner->title;
            $this->description = $banner->description;
            $this->photo = $banner->photo;
            $this->status = $banner->status;
        }
    }


    public function submit()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:50|min:5',
            'description' => 'nullable|string',
            'photo' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $validatedData;
        $slug = Str::slug($validatedData['title']);
        $count = Banner::where('slug', $slug)->count();
        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }
        $data['slug'] = $slug;
        // dd($data);
        if ($this->banner) {
            // Update existing banner
            $this->banner->update($data);
            session()->flash('success', 'Banner updated successfully.');
        } else {
            // Create new banner
            Banner::create($data);
            session()->flash('success', 'Banner created successfully.');
            $this->reset();
        }
        // return redirect()->route('banner.index');
        // $this->redirect(route('banner.index'));
        return $this->redirect(route('banner.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.banner.create-banner');
    }
}
