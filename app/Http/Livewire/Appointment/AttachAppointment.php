<?php

namespace App\Http\Livewire\Appointment;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AttachAppointment extends Component
{
    use WithFileUploads;

    public $model;
    public $appointment;
    public $type;

    public $content;
    public $media;

    public $upload;
    public $temp_url;

    public $show = false;
    public $show_attachement = false;

    protected $listeners = [
        "showAttachmentForm",
        "hideAttachmentForm",
        "toggleAttachmentForm",
        "attachmentAdded" => '$refresh',
        "attachmentDeleted" => '$refresh',
    ];

    public function hideAttachmentForm()
    {
        $this->show = false;
    }

    public function showAttachmentForm()
    {
        $this->show = false;
    }

    public function toggleAttachmentForm()
    {
        $this->show = !$this->show;
    }

    public function updatedMedia()
    {
    }

    public function save()
    {

        $url = str_replace("public/", "", $this->temp_url);

        $options = ['user_id' => Auth::id(),'content' => $this->content];

        $this->upload = $this->appointment
            ->addMedia($this->media->getRealPath())
            ->usingName($this->media->getClientOriginalName())
            ->withCustomProperties($options)
            ->toMediaCollection('attachments');

        $this->show = false;
        $this->show_attachement = false;

        $this->emit("attachmentAdded");
        //$this-> ();
    }

    public function clearUpload()
    {
        $this->cleanupOldUploads();
        $this->media = null;
        $this->upload = null;
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.appointment.attach-appointment');
    }
}
