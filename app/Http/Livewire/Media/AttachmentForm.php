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

    protected $listeners = [ "attachmentDeleted"];

    /**
     * @var InteractsWithMedia $model
     */
    public $model;

    public $show = true;

    /**
     * @var TemporaryUploadedFile
     */
    public $media;

    public $upload;

    public function updatedMedia()
    {
        $this->save();
    }

    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
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
        $this->hideFileInput();
    }

    public function hideFileInput()
    {
        $this->cleanupOldUploads();
        $this->media = null;
        $this->show = false;
    }

    public function showFileInput()
    {
        $this->show = true;
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
