<div>
    <div class="bg-gray-50 px-6 py-4 border rounded-md shadow-sm">
        <div class="flex space-x-2">
            <div class="space-y-2">
                @if($media->mime_type == 'image/jpeg' || $media->mime_type == "image/png")
                    <div class="w-32 h-32 rounded-full border shadow px-6 py-4 border rounded-xl bg-center bg-cover" style="background-image: url('{{$media->getFullUrl()}}')"></div>
                @elseif($media->mime_type == 'application/pdf')
                    <svg class="w-32 h-32 rounded-full border shadow text-red-400 " fill="currentColor" viewBox="0 0 384 512"><path d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.2 10.8 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.6 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-54.5 68 5.6 6.9 16 10 21.5 10 17.9 0 35.7-18 61.1-61.8 25.8-8.5 54.1-19.1 79-23.2 21.7 11.8 47.1 19.5 64 19.5 29.2 0 31.2-32 19.7-43.4-13.9-13.6-54.3-9.7-73.6-7.2zM377 105L279 7c-4.5-4.5-10.6-7-17-7h-6v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-74.1 255.3c4.1-2.7-2.5-11.9-42.8-9 37.1 15.8 42.8 9 42.8 9z"/></svg>
                @else
                    <svg class="text-blue-400 w-32 h-32 rounded-full border shadow" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm64 236c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-64c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-72v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm96-114.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
                @endif
            </div>
            <div class="flex-1 px-2 space-y-2 overflow-x-hidden">
                <div class="flex items-center">
                    <p class="flex-1 text-lg font-bold tracking-wide text-gray-600 whitespace-pre-wrap">{!! $media->file_name !!}</p>
                </div>
                <div class="text-lg text-gray-500 font-bold tracking-wide">
                    <span>{{ __("Size") }}: </span> <span>{{ $media->human_readable_size }}</span>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ $media->getFullUrl() }}" target="_blank" class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-green-400 hover:text-white hover:bg-green-600">
                        {{ __("View") }}
                    </a>
                    @if($this->canDelete($media))
                        <button wire:click="delete()" type="button" class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-red-400 hover:text-white hover:bg-red-600">
                            {{ __("Delete") }}
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
