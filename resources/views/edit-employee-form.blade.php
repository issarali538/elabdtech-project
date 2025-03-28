<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Company Form') }}
        </h2>
    </x-slot>
    <div class="mx-w-7xl sm:px-6 lg:px-8 py-4">
        <div class="bg-gray-700 rounded-xl p-5">
            <form method="POST" action={{ route('employee.update', ['employee' => $employee->id]) }} class="w-full">
                @csrf
                @method('PUT')
                <div class="w-full flex flex-wrap gap-[1%]">
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="First Name" value={{ $employee->first_name }} type="text" name="first_name">
                        @error('first_name')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Employee Last Name" value={{ $employee->last_name }} type="text"
                            name="last_name">
                        @error('last_name')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Employee Email" value={{ $employee->email }} type="email" name="email">
                        @error('email')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Employee Phone" value={{ $employee->phone }} type="text" name="phone">
                        <small class="text-gray-400">Phone Number e.g 03085724732</small>
                        @error('phone')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[100%]">
                        <select
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Employee Phone" name="company">
                            <option class="text-gray-400" selected>Select Company</option>
                            @foreach ($companies as $company)
                                <option value={{ $employee->company_id }}
                                    {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('phone')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <input class="text-white bg-gray-700 py-2 px-3 rounded-xl border border-gray-500 cursor-pointer"
                            type="submit" value="Update Employee Info">
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
