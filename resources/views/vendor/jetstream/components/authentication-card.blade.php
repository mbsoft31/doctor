<div {{ $attributes->merge(["class" => "flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-blue-50" ]) }}>
    <div class="w-full sm:max-w-lg flex flex-col items-center">
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-blue-100 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
