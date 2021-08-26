@props(["appointment"])

@php
    if($appointment->appointment_at->user->hasRole("doctor"))
        $color="blue-600";
    elseif($appointment->appointment_at->user->hasRole("laboratory"))
        $color="green-600";
    else
        $color="gray-600";
@endphp

<div {{ $attributes }}>
    <div class="border rounded-lg shadow-sm overflow-hidden">
        <div class="px-4 py-1.5 bg-{{$color}}">
            <span class="inline-block text-sm font-semibold text-gray-50">{{ $appointment->date }} - </span>
            <span class="inline-block text-sm font-semibold text-gray-50">{{ $appointment->time }}</span>
        </div>
        <div class="px-4 py-4 space-y-2">
            <div class="">
                <span class="block text-sm font-semibold tracking-wide">{{ __("Appointment at") }}: </span>
                <span class="block font-bold">{{ $appointment->appointment_at->name }}</span>
            </div>
            @if($appointment->appointment_at->user->hasRole("doctor"))
                <div class="">
                    <span class="block text-sm font-semibold tracking-wide">{{ __("Speciality") }}: </span>
                    <span class="block font-bold">{{ $appointment->appointment_at->speciality->name }}</span>
                </div>
            @endif
            <div class="">
                <span class="block text-sm font-semibold tracking-wide">{{ __("Address") }}: </span>
                <span class="block font-bold">{{ $appointment->appointment_at->address }}</span>
            </div>
            <div class="">
                <span class="block text-sm font-semibold tracking-wide">{{ __("Phone") }}: </span>
                <span class="block font-bold">{{ $appointment->appointment_at->user->phone }}</span>
            </div>
        </div>
    </div>
</div>
