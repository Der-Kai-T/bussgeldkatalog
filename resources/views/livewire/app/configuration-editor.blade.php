<div>
    <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div
            class="p-6 w-full h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 sticky top-0">


            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Konfiguration

            </h5>

            <div class="mb-4">
                <form class="w-full pb-4" wire:submit="submitForm">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-app.form.input model="key"/>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            @if($edit)
                                @if($deleteConfirm)
                                    <button type="button"
                                            wire:click="confirmDelete"
                                            class="
                                    float-end
                                    text-white
                                    bg-red-900
                                    hover:bg-red-400
                                     focus:ring-4
                                     focus:outline-none
                                     focus:ring-gray-300
                                     font-medium
                                     rounded-lg
                                     text-sm
                                     px-5
                                     py-2.5
                                     text-center
                                     cursor-pointer
                                     dark:bg-red-900
                                     dark:hover:bg-red-400
                                     dark:focus:ring-red-800
                         ">
                                        <span class="fas fa-trash"></span>
                                        Löschen bestätigen
                                    </button>
                                @else
                                    <button type="button"
                                            wire:click="delete"
                                            class="
                                    text-black
                                    bg-orange-500
                                    hover:bg-orange-400
                                     focus:ring-4
                                     focus:outline-none
                                     focus:ring-gray-300
                                     font-medium
                                     rounded-lg
                                     text-sm
                                     px-5
                                     py-2.5
                                     text-center
                                     cursor-pointer
                                     dark:bg-orange-500
                                     dark:hover:bg-orange-400
                                     dark:focus:ring-orange-800
                         ">
                                        <span class="fas fa-trash"></span>
                                        Löschen
                                    </button>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <x-app.form.textarea model="value"/>
                        </div>


                    </div>

                    <x-app.form.submit/>
                    <button
                        type="button"
                        wire:click="createNew"
                        class="
                        text-white
                        bg-gray-700
                        hover:bg-gray-800
                         focus:ring-4
                         focus:outline-none
                         focus:ring-gray-300
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
                        <i class="fas fa-plus-circle"></i>
                        neu
                    </button>

                </form>
            </div>
            <div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-200"
                       style="margin-top: 3rem">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 sticky top-0">
                    <tr class="sticky top-0">
                        <th class="sticky top-0 ">Key</th>
                        <th class="sticky top-0 " style="width: 70%">Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($configurations as $c)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top ">
                            <td>
                                <button
                                    class="text-blue-500 cursor-pointer"
                                    wire:click="load('{{ $c->id }}')">
                                    {{ $c->key }}
                                </button>
                            </td>
                            <td>{!!   join("<br>", explode("\n", $c->value)) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
