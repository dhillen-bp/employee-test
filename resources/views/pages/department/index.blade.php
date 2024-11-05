@extends('layouts.app')

@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">DATA DEPARTMENT</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('department.index') }}"
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
                            Department</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="mt-8 pb-4">
        <div class="mb-2 flex justify-between">
            <h3 class="mb-2 text-xl font-bold">Tabel Data Department / Calon Penerima</h3>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg">
            <div class="flex-column flex flex-wrap items-center justify-between space-y-4 pb-4 sm:flex-row sm:space-y-0">

                <a href="{{ route('department.create') }}"
                    class="text- mb-2 me-2 flex items-center justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    <span>
                        @include('partials.icons._plus-icons', [
                            'class' => 'h-5 w-5 text-white',
                        ])
                    </span>
                    Create Department</a>

            </div>
            <table class="mt-2 w-full text-left text-sm text-gray-500 rtl:text-right" id="department-table">
                <thead class="bg-blue-50 text-center text-xs font-bold uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                ID @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                Nama @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="flex items-center">
                                Desc @include('partials.icons._sort-icon')
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr class="text-gray-900 odd:bg-white even:bg-blue-50 hover:bg-gray-50 even:hover:bg-blue-100">
                            <th class="px-6 py-4">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $department->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $department->description }}
                            </td>
                            <td class="flex justify-between px-6 py-4">
                                <a href="{{ route('department.edit', $department->id) }}"
                                    class="rounded-lg bg-yellow-400 px-3 py-2 text-center text-xs font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900">Edit</a>

                                <button data-id="{{ $department->id }}" data-name="{{ $department->nama }}"
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
                    // Ambil data-target tanpa tanda #
                    const targetSelector = button.getAttribute('data-target');
                    const modal = document.querySelector(targetSelector);

                    console.log(name); // Untuk debugging

                    if (modal) {
                        console.log("modal ", name);
                        const modalBody = modal.querySelector('.modal-body');
                        if (modalBody) {
                            // Menggunakan innerHTML untuk memasukkan HTML
                            modalBody.innerHTML = `Anda yakin menghapus data <strong>${name}</strong>?`;
                        }
                        modal.querySelector('form').setAttribute('action',
                            `/department/destroy/${id}`);
                        modal.classList.remove('hidden');
                    }
                }

                if (event.target.matches('[data-modal-close]')) {
                    const modals = document.querySelectorAll('.modal');
                    modals.forEach(modal => modal.classList.add('hidden'));
                }
            });
        });
    </script>
@endpush
