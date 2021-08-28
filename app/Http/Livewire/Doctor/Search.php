<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use App\Models\Laboratory;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{

    use withPagination;

    public $search;
    public $date;

    protected $queryString = [
        "search" => ["except" => ''],
        "date"
    ];

    public $city = null;

    public $cities;

    public function mount()
    {
        $this->initCites();
    }

    public function initCites()
    {
        $this->cities = Doctor::query()
            ->distinct()
            ->select(["city"])
            ->orderBy("city")
            ->get()
            ->pluck("city")
            ->toArray();
    }

    public function query($perPage = 2)
    {
        return Doctor::search($this->search)->city($this->city)->paginate($perPage);
    }

    public function updated($key, $value)
    {
        $this->page = collect(["search", "date", "city"])->contains($key) ? 1 : $this->page;
    }

    public function render()
    {
        return view('livewire.doctor.search', [
            "doctors" => $this->query(),
        ]);
    }

}
