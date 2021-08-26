<?php

namespace App\Http\Livewire\Role;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Delete extends Component
{
    use AuthorizesRequests;

    public $inline = false;
    public $show = false;

    public Role $role;

    protected $listeners = [
        "deleteRole",
        "cancel",
    ];

    public function delete()
    {
        $this->role->delete();
        $this->emit("roleDeleted");
    }

    public function deleteRole(Role $role)
    {
        $this->show = true;
        $this->mount($role);
    }

    public function cancel()
    {
        if ( ! $this->inline )
            redirect()->route('role.index');
        $this->show = false;
    }

    /**
     * @param Role $role
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function mount(Role $role)
    {
        $this->role = $role;
    }

    public function render()
    {
        return view('role.delete');
    }
}
