<div class="max-w-md mx-auto">
    <div class="relative" x-data="{ open: false, search: '', selected: '', options: ['Amsterdam', 'Berlin', 'London', 'New York', 'Paris', 'Rome', 'San Francisco', 'Sydney', 'Tokyo', 'Toronto', 'Vancouver', 'Vienna'] }">
        <button @click="open = !open" type="button" class="relative w-full cursor-default rounded-lg bg-white py-3 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
            <span class="block truncate" x-text="selected || 'Select a city'"></span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>
        <div x-show="open" @click.away="open = false" class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
            <div class="p-2">
                <input type="search" x-model="search" class="w-full rounded-md border-0 bg-gray-50 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search cities..." @keydown.escape.stop="open = false">
            </div>
            <ul class="max-h-60 overflow-auto rounded-md py-1 text-base focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-0">
                <template x-for="option in options.filter(item => item.toLowerCase().includes(search.toLowerCase()))" :key="option">
                    <li class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900 hover:bg-indigo-600 hover:text-white" role="option" @click="selected = option; open = false">
                        <span class="block truncate" x-text="option"></span>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" x-show="selected === option">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>