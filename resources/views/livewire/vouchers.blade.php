<div>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <!-- Search input -->
    <div class="flex justify-center flex-1 lg:mr-32 mb-8">
        <div
          class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
        >
          <div class="absolute inset-y-0 flex items-center pl-2">
            <svg
              class="w-4 h-4"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
            <input
              class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
              type="text"
              placeholder="Search for vouchers"
              wire:model="search"
            />
        </div>
    </div>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-8 ">
        @foreach($vouchers as $data)
        <!-- Card -->
        <div class="transition delay-700 duration-300 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="items-center p-3 mr-4 text-green-500 bg-green-100 rounded dark:text-green-100 dark:bg-green-500 flex-auto">
                <p
                class="text-lg font-semibold "
                >
                {{ $data->discount }}
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                    <path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z"/>
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z"/>
                </svg>
            </div>
            <div class="flex-1">
                <p
                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                {{ $data->title }}
                </p>
                <p
                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                {{ $data->subtitle }}
                </p>
                
            </div>
            <div class="p-3 mr-4 flex-auto">
                <button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                wire:click="getVoucher({{ $data->id }})"
                >
                <span>Icon right</span>
                
                </button>
                <p
                class="mt-4 text-xs font-normal text-gray-400 dark:text-gray-200 flex justify-end "
                >
                    Used {{ $data->often_used }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
