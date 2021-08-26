<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    protected $listeners = ["roleUpdated"];

    public function roleUpdated()
    {
        session()->flash("flash.banner", "role updated successfully");
        session()->flash("flash.bannerStyle", "success");
    }

    public function render()
    {
        return view('role.index', [
            "roles" => Role::all()
        ]);
    }
}
