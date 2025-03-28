<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>
    <div class="py-3 px-8">
        <div class="py-5 bg-gray-800 mt-4 text-white w-full px-6 rounded-md mb-2">
            <ul class="list-none text-2xl">
                <li class="mb-3">
                    <span class="font-bold italic">Company Name: </span> {{ $company->name }}
                </li>
                <li class="mb-3">
                    <span class="font-bold italic">Company email: </span> {{ $company->email }}
                </li>
                <li class="mb-3">
                    <span class="font-bold italic">Company Logo:</span>
                    <img src={{ asset('storage/' . $company->logo) }} />
                </li>
            </ul>
        </div>
    </div>

</x-app-layout>
