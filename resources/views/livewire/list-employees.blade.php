<div>
    <div class="container">
        <div class="d-flex justify-content-center p-2">
            <h3 class="text-2xl font-bold text-center mb-10">EMPLOYEES</h3>
        </div>
        <div class="flex justify-content-end align-items-end">
            <a href="{{ route('api') }}" class="p-2">
                <x-primary-button class="w-full justify-center bg-green-700 hover:bg-green-900" :href="route('api')">
                    {{ __('Get API Employees') }}
                </x-primary-button>
            </a>
        </div>
        <hr>
        @if (Session::has('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('msg') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ADDRESS</th>
                                <th scope="col">PHONE</th>
                                <th scope="col">WEBSITE</th>
                                <th scope="col">COMPANY</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="text-center text-xs">
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }} </td>
                                    <td>{{ $employee->username }} </td>
                                    <td>{{ $employee->email }} </td>
                                    <td>{{ $employee->address }} </td>
                                    <td>{{ $employee->phone }} </td>
                                    <td>{{ $employee->website }} </td>
                                    <td>{{ $employee->company }} </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">

                                            <a href="{{ route('employees.edit', $employee) }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 justify-center">UPDATE</a>
                                            <button
                                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 justify-center"
                                                wire:click="$emit('showAlert',{{ $employee->id }})">
                                                {{ __('Delete') }}
                                                <button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
            </div>

        </div>
    </div>
     {{-- seccion de paginado --}}
     <div class="d-flex justify-content-center"> {{ $employees->links() }} </div>

</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        livewire.on('showAlert', (employeeId) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('deleteEmployee', employeeId)
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        })
    </script>
@endpush
