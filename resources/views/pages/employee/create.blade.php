@extends('layouts.app')
@section('content')
    <div class="my-10">
        <h1 class="my-4 text-3xl font-bold">CREATE EMPLOYEE</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('index') }}"
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
                        <a href="{{ route('position.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Data
                            Employee</a>
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
                            Employee</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 space-y-5 md:grid-cols-5 md:space-x-10 md:space-y-0">

        <form method="POST" action="{{ route('employee.store') }}" id="form-employee" enctype="multipart/form-data"
            class="mx-auto w-full rounded-lg bg-slate-50 p-4 md:col-span-3">
            @csrf
            <div class="mb-5">
                <label for="name"
                    class="{{ $errors->has('name') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Employee Name <span class="text-xs text-red-500">*</span></label>
                <input type="text" id="name" name="name" required
                    class="{{ $errors->has('name') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('name') }}" />
                @error('name')
                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="position_id"
                    class="{{ $errors->has('position_id') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Position <span class="text-xs text-red-500">*</span></label>
                <select id="position_id" name="position_id"
                    class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option selected disabled>-choose a value-</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                            {{ $position->name }}</option>
                    @endforeach
                </select>
                @error('position_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="description"
                    class="{{ $errors->has('description') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Email <span class="text-xs text-red-500">*</span></label>
                <input type="email" id="email" name="email" required
                    class="{{ $errors->has('email') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('email') }}" />
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="phone"
                    class="{{ $errors->has('phone') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Phone</label>
                <input type="number" name="phone" id="phone" aria-describedby="helper-text-explanation"
                    class="{{ $errors->has('phone') ? 'input-error' : 'input-default' }} block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    value="{{ old('phone') }}" pattern="^(?:\+62|62|0)8[1-9][0-9]{6,9}$" />
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="address"
                    class="{{ $errors->has('address') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Address</label>
                <input type="text" id="address" name="address"
                    class="{{ $errors->has('address') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm"
                    value="{{ old('address') }}" />
                @error('address')
                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="status"
                    class="{{ $errors->has('status') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Status: <span class="font-bold text-red-500">*</span></label>
                <select id="status" name="status"
                    class="{{ $errors->has('status') ? 'input-error' : 'input-default' }} block w-full rounded-lg border p-2.5 text-sm">
                    <option selected disabled>-Pilih-</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}> Active </option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}> Inactive </option>
                </select>
                @error('status')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="salary"
                    class="{{ $errors->has('salary') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Salary</label>
                <input type="number" id="salary" name="salary" aria-describedby="helper-text-explanation"
                    class="{{ $errors->has('salary') ? 'input-error' : 'input-default' }} block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    value="{{ old('salary') }}" />

                @error('salary')
                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="hire_date"
                    class="{{ $errors->has('hire_date') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Hire Date <span class="text-xs text-red-500">*</span></label>

                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker id="hire_date" type="text" name="hire_date"
                        class="block w-full rounded-lg border bg-white p-2.5 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Select date" value="{{ old('hire_date', '') }}">
                </div>

                @error('hire_date')
                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="photo"
                    class="{{ $errors->has('photo') ? 'text-red-900' : 'text-gray-900' }} mb-2 block text-sm font-medium">
                    Photo</label>

                <input type="file" class="filepond" name="photo">

                @error('photo')
                    <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="mt-1 w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Save</button>
        </form>

    </div>
@endsection

@push('after-script')
    <script type="module">
        $.validator.addMethod("regex", function(value, element, regexp) {
            return this.optional(element) || regexp.test(value);
        }, "Please enter a valid phone number.");

        $("#form-employee").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                position_id: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    regex: /^(?:\+62|62|0)8[1-9][0-9]{6,9}$/
                }
            },
            messages: {
                name: {
                    required: "name must be filled.",
                    minlength: "name at least 3 characters."
                },
                position_id: {
                    required: "Please select a position."
                },
                email: {
                    required: "Please enter an email address.",
                    email: "Please enter a valid email address."
                },
                phone: {
                    regex: "Please enter a valid phone number. (+628123456789, 628123456789, 081234567890)"
                }
            },
            errorClass: "mt-2 text-sm text-red-600 dark:text-red-500",

            errorPlacement: function(error, element) {
                $("#" + element.attr("id") + "-error").remove();

                if ($("#" + element.attr("id") + "-error").length === 0) {
                    element.parent().append('<label id="' + element.attr("id") +
                        '-error" class="error text-red-600 text-sm">' + error.text() + '</label>');
                }
            },
            highlight: function(element) {
                $(element).addClass('border-red-600');
            },
            unhighlight: function(element) {
                $(element).removeClass('border-red-600');
                $("#" + element.id + "-error").remove();
            },

            onfocusout: function(element) {
                this.element(element);
            }
        });

        $(document).ready(function() {
            $('#position_id').select2();
        });

        document.addEventListener("DOMContentLoaded", () => {

        });
    </script>
@endpush
