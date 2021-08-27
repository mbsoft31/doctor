<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
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

    public function updated($key, $value)
    {
        $this->page = collect(["search", "date", "city"])->contains($key) ? 1 : $this->page;
    }

    public function mount()
    {
        $this->cities = Doctor::query()
            ->distinct()
            ->select(["city"])
            ->orderBy("city")
            ->get()
            ->pluck("city")
            ->toArray();
    }

    public function render()
    {
        return view('livewire.doctor.search', [
            "doctors" => $this->query(),
        ]);
    }

    public function query()
    {
        $query = Doctor::query();

        if ( ! is_null($this->city) && $this->city != '') {
            $query->where("city", "=", $this->city);
        }

        if ( ! is_null($this->search) && $this->search != '')
        {
            $query->where("first_name", 'like', "%$this->search%")
                ->orWhere("last_name", 'like', "%$this->search%")
                ->orWhere("address", 'like', "%$this->search%");
        }

        return $query->paginate(2);
    }
}
