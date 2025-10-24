<div>
    <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div
            class="p-6 w-full h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 sticky top-0">
            <div class="float-end">
                {{ $law->department }}
                @if(!empty($law->lead_office))
                    (FF {{ $law->lead_office }})
                @endif
            </div>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $law->name }} ({{$law->short}}) Prefix {{ $law->prefix }} - Tatbestand bearbeiten
            </h5>

            <div class="mb-4">
                <form class="w-full pb-4" wire:submit="submitForm">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <x-app.form.input model="number"/>
                        </div>
                        <div class="w-full md:w-2/3 px-3">
                            <x-app.form.input model="quote"/>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 ">
                            <x-app.form.textarea model="text" />
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="number" model="fine_regular"/>
                        </div>
                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="number" model="fine_min"/>
                        </div>
                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="number" model="fine_max"/>
                        </div>
                        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="number" model="legal_maximum"/>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="datetime-local" model="valid_from"/>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="datetime-local" model="valid_until"/>
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <div class="flex items-center">
                                <input wire:model="form.print" id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __("print") }}</label>
                            </div>

                        </div>
                    </div>

                    <x-app.form.submit/>

                    <a href="{{ route("law", $law->id) }}"
                       wire:navigate
                       class="

                            text-white
                            bg-gray-700
                            hover:bg-gray-800
                             focus:ring-4
                             focus:outline-none
                             focus:ring-blue-300
                             font-medium
                             rounded-lg
                             text-sm
                             px-5
                             py-2.5
                             text-center
                             cursor-pointer
                             dark:bg-gray-700
                             dark:hover:bg-gray-700
                             dark:focus:ring-gray-800
                             "
                    >
                        <span class="fas fa-times"></span>
                        {{ __("Abort") }}
                    </a>

                </form>
            </div>
        </div>
    </div>
</div>
