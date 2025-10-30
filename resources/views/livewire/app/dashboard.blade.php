<div>
    <div>
        <div class="float-end">
            Fehlender Höchstbetrag
        </div>
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
            @foreach($missingLegalMaximum->sortBy("number") as $a)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top ">
                    <td>
                        <a href="{{ route("allegation", $a->id) }}" wire:navigate
                           class="text-blue-500 hover:text-green-500">
                            {{ $globalPrefix }}{{ $a->law->prefix }}{{ $a->number }}
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
                            Vorsatz&nbsp;{{ number_format($a->legal_maximum_intention, 2, ",", ".") }}&nbsp;€
                        @endif
                        @if(!empty($a->legal_maximum_intention) &&!empty($a->legal_maximum_careless))
                            <br>
                        @endif
                        @if(!empty($a->legal_maximum_careless))
                            {{ number_format($a->legal_maximum_careless, 2, ",", ".") }}&nbsp;€
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <div class="float-end">
            Fehlende Verstoß-Art
        </div>
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
            @foreach($missingInfringementType->sortBy("number") as $a)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top ">
                    <td>
                        <a href="{{ route("allegation", $a->id) }}" wire:navigate
                           class="text-blue-500 hover:text-green-500">
                            {{ $globalPrefix }}{{ $a->law->prefix }}{{ $a->number }}
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
                            Vorsatz&nbsp;{{ number_format($a->legal_maximum_intention, 2, ",", ".") }}&nbsp;€
                        @endif
                        @if(!empty($a->legal_maximum_intention) &&!empty($a->legal_maximum_careless))
                            <br>
                        @endif
                        @if(!empty($a->legal_maximum_careless))
                            {{ number_format($a->legal_maximum_careless, 2, ",", ".") }}&nbsp;€
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
