<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>
    <div class="py-3 px-8">
        <div class="py-5 bg-gray-800 mt-4 text-white w-full px-6 rounded-md mb-2">
            <ul class="list-none text-2xl">
                <li class="mb-3">
                    <span class="font-bold italic">Employee First Name: </span> {{ $employee->first_name }}
                </li>
                <li class="mb-3">
                    <span class="font-bold italic">Employee Last Name: </span> {{ $employee->last_name }}
                </li>
                <li class="mb-3">
                    <span class="font-bold italic">Employee email: </span> {{ $employee->email }}
                </li>
                <li class="mb-3">
                    <span class="font-bold italic">Company : </span> {{ $employee->company->name }}
                </li>
                <li class="mb-3">
                    <span class="font-bold italic">Employee Phone: </span> {{ $employee->phone }}
                </li>
            </ul>
            <div class="text-right">
                <a href="" class="px-4 py-2 bg-gray-500 rounded-xl border-2 border-gray-400">OK</a>
            </div>
        </div>
    </div>

</x-app-layout>
