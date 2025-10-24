<div>
    <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div
            class="p-6 w-full h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Alle Tatbestände
            </h5>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                <tr class="">
                    <th>TB-Nummer</th>
                    <th>Text</th>
                    <th class="text-end">Kosten</th>

                </tr>
                </thead>
                <tbody>
                @foreach($laws as $l)
                    <tr>
                        <th
                            colspan="3"
                            class="bg-blue-950 text-blue-200"
                        >
                            <div class="float-end">
                                {{ $l->department }}
                                @if(!empty($law->lead_office))
                                    (FF {{ $law->lead_office }}
                                @endif
                            </div>
                            {{ $l->name }}
                        </th>
                    </tr>

                    @foreach($l->allegations as $a)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top ">
                            <td>
                                <a href="{{ route("allegation", $a->id) }}" wire:navigate class="text-blue-500 hover:text-green-500">
                                    {{ $globalPrefix }}{{ $l->prefix }}{{ $a->number }}
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
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
