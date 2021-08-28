<?php

namespace App\Http\Livewire\Media;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AttachmentCard extends Component
{

    public $media;

    public function canDelete($media)
    {
        return Auth::id() == $media->getCustomProperty("user_id");
    }

    public function delete()
    {
        $this->media->delete();
        $this->emit("attachmentDeleted");
    }

    public function render()
    {
        $types = ["application/pdf", "application/vnd.oasis.opendocument.text", "image/jpeg", "image/png"];
        return view('livewire.media.attachment-card');
    }
}
