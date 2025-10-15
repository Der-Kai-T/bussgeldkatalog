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

                </form>
            </div>
            <div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-200">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 sticky top-0">
                    <tr class="sticky top-0">
                        <th class="sticky top-0 ">TB-Nummer</th>
                        <th class="sticky top-0 ">Text</th>
                        <th class="sticky top-0 text-end">Kosten</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($law->allegations->sortBy("number") as $a)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top ">
                            <td>
                                {{ $globalPrefix }}{{ $law->prefix }}{{ $a->number }}

                            </td>
                            <td>
                                {{ $a->text }}<br>
                                <small
                                    class="text-gray-400"
                                >
                                    {{ $a->quote }}
                                </small>
                            </td>
                            <td class="text-end">
                                @if(!empty($a->fine_regular))
                                    {{ number_format($a->fine_regular, 2,",",".") }} €
                                @endif

                                @if(!empty($a->fine_regular) && (!empty($a->fine_min) || !empty($a->fine_max)))
                                    <br>
                                @endif

                                @if(!empty($a->fine_min) || !empty($a->fine_max))
                                    Rahmen:
                                @endif

                                @if(!empty($a->fine_min))
                                    {{ number_format($a->fine_min, 2, ",",".") }} €
                                @endif

                                @if(!empty($a->fine_max))
                                    bis {{ number_format($a->fine_max, 2, ",",".") }} €
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
