<?php

namespace App\Http\Livewire\Speciality;

use App\Models\Speciality;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = ["specialityUpdated"];

    public function specialityUpdated()
    {
        session()->flash("flash.banner", "speciality updated successfully");
        session()->flash("flash.bannerStyle", "success");
    }

    public function render()
    {
        return view('speciality.index', [
            "specialities" => Speciality::where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
