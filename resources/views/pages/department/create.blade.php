@extends('layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">CREATE DEPARTMENT</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('department.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        @include('partials.icons._dashboard-icon', ['class' => 'me-0.5 h-3 w-3'])
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('department.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Department</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">Create
                            Department</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

        <form method="POST" action="{{ route('department.store') }}" id="form-employee"
            class="mx-auto w-full rounded-lg bg-slate-50 p-4 md:col-span-3">
            @csrf
            <div class="mb-5">
                <label for="name"
                    class="{{ $errors->has('name') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Department Name <span class="text-xs text-red-500">*</span></label>
                <input type="text" id="name" name="name" required
                    class="{{ $errors->has('name') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('name') }}" aria-describedby="name-error" />
                @error('name')
                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="description"
                    class="{{ $errors->has('description') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Description</label>
                <textarea id="description" rows="4" name="description"
                    class="{{ $errors->has('description') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Save</button>
        </form>

    </div>
@endsection

@push('after-script')
    <script type="module">
        $("#form-employee").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
            },
            messages: {
                name: {
                    required: "name must be filled.",
                    minlength: "name at least 3 characters."
                },
            },
            errorClass: "mt-2 text-sm text-red-600 dark:text-red-500",

            errorPlacement: function(error, element) {
                // Hapus pesan kesalahan sebelumnya jika ada
                $("#" + element.attr("id") + "-error").remove();

                // Tambahkan pesan kesalahan baru jika tidak ada
                if ($("#" + element.attr("id") + "-error").length === 0) {
                    element.parent().append('<label id="' + element.attr("id") +
                        '-error" class="error text-red-600 text-sm">' + error.text() + '</label>');
                }
            },
            highlight: function(element) {
                $(element).addClass('border-red-600'); // Menambahkan border merah saat error
            },
            unhighlight: function(element) {
                $(element).removeClass('border-red-600'); // Menghapus border merah saat validasi berhasil
                $("#" + element.id + "-error").remove(); // Menghapus pesan kesalahan saat validasi berhasil
            },
            // Fungsi untuk menghapus pesan kesalahan jika input valid
            onfocusout: function(element) {
                this.element(element);
            }
        });
    </script>
@endpush
