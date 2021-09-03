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
        if (!$this->media)
            return;

        $this->temp_url = $this->media->store('public/tmp');

        // $this->save();
    }

    public function save()
    {

        $url = asset(str_replace("public/", "storage/", $this->temp_url));

        $this->upload = $this->appointment
            ->addMediaFromUrl($url)
            ->withCustomProperties(['user_id' => Auth::id()])
            ->withCustomProperties(['content' => $this->content])
            ->toMediaCollection('attachments');

        $this->emit("attachmentAdded");
        //$this-> ();
    }

    public function clearUpload()
    {
        $this->cleanupOldUploads();
        $this->media = null;
        $this->temp_url = null;
        $this->upload = null;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.appointment.attach-appointment');
    }
}
