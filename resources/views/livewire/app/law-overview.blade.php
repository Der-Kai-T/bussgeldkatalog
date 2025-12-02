<div>
    <div class="card">
        <div
            class="card-header">
            <h5 class="card-title">
                Übersicht Gesetze
            </h5>
            <div class="float-end">
                <a class="btn btn-primary" href="/law-create">
                    <span class="fas fa-plus-circle"></span>neu
                </a>
                @if(request()->has('showEmpty'))
                    <a class="btn btn-info" href="/laws">verstecke freie Nummern</a>
                @else
                    <a class="btn btn-info"
                        href="/laws?showEmpty">zeige freie Nummern</a>
                @endif

            </div>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Gesetze
            </h5>
        </div>
        <div class="card-body">

            <table class="table table-striped datatable">
                <thead>
                <tr class="">
                    <th>Prefix</th>
                    <th>Abkürzung</th>
                    <th>Gesetz</th>
                    <th>Tatbestände</th>
                </tr>
                </thead>
                <tbody>
                @php($lastPrefix = 999)
                @foreach($laws as $l)

                    @if(request()->has('showEmpty'))
                        @while($l->prefix > $lastPrefix + 1)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top">
                                <td>{{ $lastPrefix + 1 }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @php($lastPrefix = $lastPrefix + 1)
                        @endwhile
                    @endif

                    @php($lastPrefix = $l->prefix)

                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 align-text-top">
                        <td>
                            <a
                                href="{{ route("law", $l->id) }}"
                                wire:navigate="{{ route("law", $l->id) }}"
                            >
                                {{ $l->prefix }}
                            </a>
                        </td>
                        <td>{{ $l->short }}</td>
                        <td>
                            {{ $l->name }}
                            @if(strlen($l->name) > 64)
                                <span class="text-danger">
                                    <span class="fas fa-triangle-exclamation "></span>
                                    {{ strlen($l->name) }} / 64 Zeichen (+{{ strlen($l->name)-64 }})

                                </span>
                            @endif

                        </td>
                        <td>{{ $l->allegations->count() }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
