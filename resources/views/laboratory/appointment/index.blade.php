<x-app-layout>

    <x-slot name="header">
        <h1 class="py-8 text-4xl font-semibold tracking-wide">
            {{ __("My appointments") }}
        </h1>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="mt-8 px-6 py-4">
            <livewire:laboratory.appointments />
        </div>
    </div>

</x-app-layout>
