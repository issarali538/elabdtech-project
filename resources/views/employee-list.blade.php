<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>
    <div class="py-3 px-8">
        @session('success')
            <div class="py-5 bg-gray-800 mt-4 text-green-500 w-full px-6 rounded-md mb-2">
                {{ session('success') }}
            </div>
        @endsession
        <div class="py-5 bg-gray-800 mt-4 text-white w-full px-6 rounded-md mb-2">
            <a class="py-2 px-3 border-gray-400 border-2 rounded-xl" href="{{ route('add-employee-form') }}">Add
                Employee</a>
        </div>
        <div class="py-4 bg-gray-800 mt-4 text-white w-full px-6 rounded-md table">
            <table class="w-full">
                <thead class="font-bold">
                    <tr>
                        <td>Id</td>
                        <td>
                            First Name
                        </td>
                        <td>Last Name</td>
                        <td>Company</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td colspan="3">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="border-1 border-white">{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->email }}</td>
                            <td><a class="py-1 px2 border-2 p-2 border-gray-500 rounded-xl"
                                    href={{ route('employee.edit', ['employee' => $employee->id]) }}>edit</a></td>
                            <td>
                                <form action={{ route('employee.destroy', ['employee' => $employee->id]) }}
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
                                    href={{ route('employee.show', ['employee' => $employee->id]) }}>Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
