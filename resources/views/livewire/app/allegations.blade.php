<div>
    <div class="card">
        <div
            class="card-header">
            <h5 class="card-title">
                Alle Tatbestände
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped datatable">
                <thead >
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
                            class="law-headline"
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
                        <tr class="">
                            <td>
                                <a href="{{ route("allegation", $a->id) }}" wire:navigate >
                                    {{ $globalPrefix }}{{ $l->prefix }}{{ $a->number }}
                                </a>


                            </td>
                            <td>
                                {{ $a->text }}<br>
                                <small
                                    class="law-quote"
                                >
                                    {{ $a->quote }}
                                </small>
                            </td>
                            <td class="text-end">
                                @if(!empty($a->fine_regular))
                                    {{ number_format($a->fine_regular, 2,",",".") }}&nbsp;€
                                @endif

                                @if(!empty($a->fine_regular) && (!empty($a->fine_min) || !empty($a->fine_max)))
                                    <br>
                                @endif

                                @if(!empty($a->fine_min) || !empty($a->fine_max))
                                    Rahmen:
                                @endif

                                @if(!empty($a->fine_min))
                                    {{ number_format($a->fine_min, 2, ",",".") }}&nbsp;€
                                @endif

                                @if(!empty($a->fine_max))
                                    bis {{ number_format($a->fine_max, 2, ",",".") }}&nbsp;€
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
