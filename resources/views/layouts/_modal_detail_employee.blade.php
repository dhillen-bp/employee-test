<!-- Main modal -->
<div id="detail-modal" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-2xl p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Employee
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="detail-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-4 p-4 md:p-5">
                <div class="flex items-center justify-center">
                    <img class="h-24 w-24 rounded-full md:h-36 md:w-36" src="" alt="Rounded avatar">
                </div>
                <div class="mx-auto px-8">
                    <div class="mt-6 border-t">
                        <dl class="divide-y">
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Name</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="name"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Email</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="email"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Phone</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="phone"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Address</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="address"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Position</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="position"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Department</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="department"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Hire Date</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="hire_date"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Status</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="status"></dd>
                            </div>
                            <div class="px-4 py-4 text-base sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="font-medium">Salary</dt>
                                <dd class="mt-1 sm:col-span-2 sm:mt-0" id="salary"></dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
