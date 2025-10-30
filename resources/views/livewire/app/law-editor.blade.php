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
                {{ $law->name }} ({{$law->short}})
            </h5>

            <div class="mb-4">
                <form class="w-full pb-4" wire:submit="submitForm">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <div
                                class="float-end {{ strlen($form->name) > 64 ? "text-red-800" : "" }}">{{ strlen($form->name) }}
                                Zeichen
                            </div>
                            <x-app.form.input model="name"/>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <x-app.form.input model="short"/>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <x-app.form.input model="prefix"/>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <x-app.form.input model="department"/>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <x-app.form.input model="lead_office"/>
                        </div>

                    </div>

                    <x-app.form.submit/>
                    <div>
                        <button
                            wire:click="$dispatch('openModal', { component: 'app.modal.law-delete',  arguments: { lawid: '{{ $law->id }}' } })"
                            type="button"
                            class="
                        text-white
                        bg-orange-700
                        hover:bg-orange-800
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
                         dark:bg-orange-700
                         dark:hover:bg-orange-700
                         dark:focus:ring-orange-800
                 ">
                            <span class="fas fa-trash"></span>
                            Gesetz löschen
                        </button>
                    </div>


                </form>
            </div>
            <div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-200"
                       style="margin-top: 3rem">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 sticky top-0">
                    <tr class="sticky top-0">
                        <th class="sticky top-0 ">TB-Nummer</th>
                        <th class="sticky top-0 ">Text</th>
                        <th class="sticky top-0 "></th>
                        <th class="sticky top-0 text-end">Regelsatz</th>
                        <th class="sticky top-0 text-end">Rahmen</th>
                        <th class="sticky top-0 text-end">gesetzl. Maximum</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($law->allegations->sortBy("number") as $a)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top ">
                            <td>
                                <a href="{{ route("allegation", $a->id) }}" wire:navigate
                                   class="text-blue-500 hover:text-green-500">
                                    {{ $globalPrefix }}{{ $law->prefix }}{{ $a->number }}
                                </a>
                            </td>
                            <td>
                                {{ $a->text }}<br>
                                <small
                                    class="text-gray-400"
                                >
                                    {{ $a->quote }}
                                </small>
                            </td>
                            <td>

                                {{ $a->infringement?->short }}

                                @if($a->print)
                                    <span class="fas fa-print"></span>
                                @else
                                    <span class="fa-layers fa-fw">
                                    <i class="fas fa-print text-gray-500"></i>
                                    <i class="fas fa-slash text-red-500 font-bold"></i>
                                    </span>
                                @endif
                            </td>
                            <td class="text-end">
                                @if(!empty($a->fine_regular))
                                    {{ number_format($a->fine_regular, 2,",",".") }} €
                                @endif
                            </td>
                            <td class="text-end">
                                @if(!empty($a->fine_min))
                                    {{ number_format($a->fine_min, 2, ",",".") }} €
                                @endif

                                @if(!empty($a->fine_max))
                                    bis {{ number_format($a->fine_max, 2, ",",".") }} €
                                @endif
                            </td>
                            <td class="text-end">
                                @if(!empty($a->legal_maximum_intention))
                                    Vorsatz {{ number_format($a->legal_maximum_intention, 2, ",", ".") }} €
                                @endif
                                @if(!empty($a->legal_maximum_intention) &&!empty($a->legal_maximum_careless))
                                    <br>
                                @endif
                                @if(!empty($a->legal_maximum_careless))
                                     {{ number_format($a->legal_maximum_careless, 2, ",", ".") }} €
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
