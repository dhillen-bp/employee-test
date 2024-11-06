@extends('layouts.app')

@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DATA EMPLOYEE</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="me-0.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Data
                            Employee</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="mt-8 pb-4">
        <div class="mb-2 flex justify-between">
            <h3 class="mb-2 text-xl font-bold">Tabel Data Employee </h3>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex-column flex flex-wrap items-center justify-between space-y-4 pb-4 sm:flex-row sm:space-y-0">

                <a href="{{ route('employee.create') }}"
                    class="text- mb-2 me-2 flex items-center justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <span>
                        @include('partials.icons._plus-icons', [
                            'class' => 'h-5 w-5 text-white',
                        ])
                    </span>
                    Create Employee</a>

            </div>
            <table class="mt-2 w-full text-left text-sm text-gray-500 rtl:text-right" id="data-table">
                <thead class="bg-blue-50 text-center text-xs font-bold uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                No @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Photo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                Name @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                Position @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                Hire Data @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                Status @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="text-gray-900 odd:bg-white even:bg-blue-50 hover:bg-gray-50 even:hover:bg-blue-100">
                            <th class="px-6 py-4">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ $employee->photo ? Storage::url('images/employee/' . $employee->photo) : asset('images/profile/user_profile.jpeg') }}"
                                    alt="Employee photo">
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->position->name }} - {{ $employee->position->department->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $employee->hire_date }}
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="{{ $employee->status == 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'dark:bg-red-900 dark:text-red-300 bg-red-100 text-red-800' }} me-2 rounded-full px-2.5 py-0.5 text-xs font-medium">{{ $employee->status }}</span>
                            </td>
                            <td class="flex justify-between gap-2 px-6 py-4">
                                <button data-id="{{ $employee->id }}" data-modal-toggle="detail-modal"
                                    data-modal-target="detail-modal" data-target="#detail-modal"
                                    class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                    Detail
                                </button>
                                <a href="{{ route('employee.edit', $employee->id) }}"
                                    class="rounded-lg bg-yellow-400 px-3 py-2 text-center text-xs font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900">Edit</a>
                                <button data-id="{{ $employee->id }}" data-name="{{ $employee->name }}"
                                    data-modal-toggle="delete-modal" data-modal-target="delete-modal"
                                    data-target="#delete-modal"
                                    class="rounded-lg bg-red-700 px-3 py-2 text-center text-xs font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Delete
                                </button>

                            </td>
                        </tr>

                        <!-- Modal HTML -->
                        @component('layouts._modal_delete_datatables')
                        @endcomponent
                        @component('layouts._modal_detail_employee')
                        @endcomponent
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('after-script')
    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            document.addEventListener('click', (event) => {
                if (event.target.matches('[data-modal-toggle="delete-modal"]')) {
                    const button = event.target;
                    const id = button.getAttribute('data-id');
                    const name = button.getAttribute('data-name');

                    const targetSelector = button.getAttribute('data-target');
                    const modal = document.querySelector(targetSelector);

                    if (modal) {
                        const modalBody = modal.querySelector('.modal-body');
                        if (modalBody) {

                            modalBody.innerHTML = `Are you sure delete data <strong>${name}</strong>?`;
                        }
                        modal.querySelector('form').setAttribute('action',
                            `/employee/destroy/${id}`);
                        modal.classList.remove('hidden');
                    }
                }

                if (event.target.matches('[data-modal-close]')) {
                    const modals = document.querySelectorAll('.modal');
                    modals.forEach(modal => modal.classList.add('hidden'));
                }
            });

            document.addEventListener('click', async (event) => {
                if (event.target.matches('[data-modal-toggle="detail-modal"]')) {
                    const button = event.target;
                    const id = button.getAttribute('data-id');

                    try {
                        const response = await fetch(`/employee/show/${id}`);
                        const data = await response.json();

                        document.querySelector('#detail-modal #name').textContent = data.name;
                        document.querySelector('#detail-modal #email').textContent = data.email;
                        document.querySelector('#detail-modal #phone').textContent = data.phone;
                        document.querySelector('#detail-modal #address').textContent = data.address;
                        document.querySelector('#detail-modal #position').textContent = data.position;
                        document.querySelector('#detail-modal #department').textContent = data
                            .department;
                        document.querySelector('#detail-modal #hire_date').textContent = data.hire_date;
                        document.querySelector('#detail-modal #status').textContent = data.status;
                        document.querySelector('#detail-modal #salary').textContent = data.salary;

                        document.querySelector('#detail-modal img').src = data.photo;

                        document.querySelector('#detail-modal').classList.remove('hidden');
                    } catch (error) {
                        console.error("Error fetching employee details:", error);
                    }
                }
            });

        });
    </script>
@endpush
