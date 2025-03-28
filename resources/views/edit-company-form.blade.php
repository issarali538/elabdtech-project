<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Company Form') }}
        </h2>
    </x-slot>
    <div class="mx-w-7xl sm:px-6 lg:px-8 py-4">
        <div class="bg-gray-700 rounded-xl p-5">
            <form method="POST" action={{ route('company.update', ['company' => $company->id]) }} class="w-full"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-full flex flex-wrap gap-[1%]">
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Company Name" value={{ $company->name }} type="text" name="name">
                        @error('name')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Company Email" value={{ $company->email }} type="email" name="email">
                        @error('email')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Company Website" value={{ $company->website }} type="text" name="website">
                        @error('website')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[49%]">
                        <input
                            class="bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Company Address" value={{ $company->address }} type="text" name="address">
                        @error('address')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 w-[100%]">
                        <img class="w-[100px] h-[100px]" src={{ asset('storage/' . $company->logo) }} alt="logo" />
                        <label for="" class="text-white">Company Logo</label>
                        <input
                            class="border-1 bg-grey-700 border-1 rounded-xl w-full py-2 px-3 bg-gray-700 focus:outline-gray-300 outline-none text-white"
                            placeholder="Company Website" type="file" name="logo">
                        @error('logo')
                            <small class="text-red-200">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <input class="text-white bg-gray-700 py-2 px-3 rounded-xl border border-gray-500 cursor-pointer"
                            type="submit" value="Save Company Info">
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
