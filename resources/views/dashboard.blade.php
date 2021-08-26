<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @if(Auth::user()->hasRole("admin"))
                <div class="bg-transparent overflow-hidden">
                    <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                        <div class="bg-indigo-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Doctors") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ \App\Models\Doctor::query()->count() }}
                                </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("doctors") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-green-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Laboratory") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ \App\Models\Laboratory::query()->count() }}
                                </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("Labs") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-red-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Appointments") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ \App\Models\Appointment::query()->count() }}
                                </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("Appointments") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-pink-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Patients") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ \App\Models\Patient::query()->count() }}
                                </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("Patients") }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->hasRole("doctor"))
                <div class="bg-transparent overflow-hidden">
                    <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                        <div class="bg-indigo-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Accepted appointments") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ Auth::user()->doctor->appointments()->where("appointments.state", "accepted")->count() }}
                                </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("appointments") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-green-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Consulted appointments") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ Auth::user()->doctor->appointments()->where("appointments.state", "consulted")->count() }}
                                </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("appointments") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-red-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Appointments") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ Auth::user()->doctor->appointments()->count() }}
                                </span>
                                        <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("Appointments") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-pink-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Patients") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ Auth::user()->doctor->appointments()->distinct()->select(["patient_id"])->count() }}
                                </span>
                                        <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("Patients") }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
        @endif

            @if(Auth::user()->hasRole("laboratory"))
                <div class="bg-transparent overflow-hidden">
                    <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-4">
                        <div class="bg-indigo-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Accepted appointments") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ Auth::user()->laboratory->appointments()->where("appointments.state", "accepted")->count() }}
                                </span>
                                        <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("appointments") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-green-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Consulted appointments") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                                <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                                    {{ Auth::user()->laboratory->appointments()->where("appointments.state", "consulted")->count() }}
                                </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                                    {{ __("appointments") }}
                                </span>
                            </div>
                        </div>
                        <div class="bg-red-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Appointments") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                        <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                            {{ Auth::user()->laboratory->appointments()->count() }}
                        </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                            {{ __("Appointments") }}
                        </span>
                            </div>
                        </div>
                        <div class="bg-pink-500 rounded-lg shadow">
                            <h2 class="text-2xl font-semibold text-gray-50 px-6 py-4">
                                {{ __("Patients") }}
                            </h2>
                            <div class="flex items-center space-x-3 px-6 py-4">
                        <span class="text-2xl md:text-5xl font-bold tracking-wide text-white">
                            {{ Auth::user()->laboratory->appointments()->distinct()->select(["patient_id"])->count() }}
                        </span>
                                <span class="text-sm md:text-lg font-bold tracking-wide text-white">
                            {{ __("Patients") }}
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
