<?php

namespace App\Http\Livewire\Role;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{

    use AuthorizesRequests;

    public $inline = false;
    public $show = true;
    public $state;

    public Role $role;

    protected $listeners = [
        "updateRole",
        "cancel",
    ];

    protected $rules = [
        "state.name"  => ['required', 'string', 'min:3', 'max:190'],
        "state.guard_name"  => ['required', 'string', "in:web,api"],
    ];

    public function save()
    {
        $this->validate();
        $this->role->update($this->state);
        $this->emit("roleUpdated", $this->role);
        $this->cancel();
    }

    public function updateRole(Role $role)
    {
        $this->show = true;
        $this->mount($role);
    }

    public function cancel()
    {
        if ( ! $this->inline )
            redirect()->route('role.index');

        $this->show = false;
        $this->state = [];
    }

    /**
     * @param Role $role
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function mount(Role $role)
    {
        $this->role = $role;
        $this->state = ( ! is_null($role) ) ? $role->only(["name", "guard_name"]) : [];
    }

    public function render()
    {
        return view('role.edit');
    }
}
