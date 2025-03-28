<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>
    <div class="py-3 px-8">
        @session('success')
            <div class="py-5 bg-gray-800 mt-4 text-green-500 w-full px-6 rounded-md mb-2">
                {{ session('success') }}
            </div>
        @endsession
        <div class="py-5 bg-gray-800 mt-4 text-white w-full px-6 rounded-md mb-2">
            <a class="py-2 px-3 border-gray-400 border-2 rounded-xl" href="{{ route('add-company-form') }}">Add
                Company</a>
        </div>
        <div class="py-4 bg-gray-800 mt-4 text-white w-full px-6 rounded-md table">
            <table class="w-full">
                <thead class="font-bold">
                    <tr>
                        <td>Id</td>
                        <td>
                            Company Name
                        </td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Website</td>
                        <td>Logo</td>
                        <td colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td class="border-1 border-white">{{ $company->id }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->website }}</td>
                            <td><img class="w-[100px] h-[100px]" src={{ asset('storage/' . $company->logo) }}
                                    alt="logo" /></td>
                            <td><a class="py-1 px2 border-2 p-2 border-gray-500 rounded-xl"
                                    href={{ route('company.edit', ['company' => $company->id]) }}>edit</a></td>
                            <td>
                                <form action={{ route('company.destroy', ['company' => $company->id]) }}
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="cursor-pointer py-1 px2 border-2 p-2 border-gray-500 rounded-xl"
                                        value="delete" type="submit" />
                                    </a>
                                </form>
                            </td>
                            <td>
                                <a class="cursor-pointer py-1 px2 border-2 p-2 border-gray-500 rounded-xl"
                                    href={{ route('company.show', ['company' => $company->id]) }}>Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
