<?php

namespace App\Http\Livewire\Media;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AttachmentForm extends Component
{
    use WithFileUploads;

    public $model;

    public $media;

    public $upload;

    public $show = true;

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
        $this->save();
    }

    public function save()
    {
        if (!$this->media)
            return;

        $data = $this->media->store('public/tmp');

        $url = asset(str_replace("public", "storage", $data));

        $this->upload = $this->model
            ->addMediaFromDisk(str_replace("public/", "", $data), "public")
            ->preservingOriginal(false)
            ->withCustomProperties(['user_id' => Auth::id()])
            ->toMediaCollection('attachments');

        $this->media->delete();

        $this->emit("attachmentAdded");
        //$this-> ();
    }

    public function clearUpload()
    {
        $this->cleanupOldUploads();
        $this->media = null;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.media.attachment-form');
    }
}
