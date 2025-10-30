<div>
    <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div
            class="p-6 w-full h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="float-end">
                <a
                    class="
                      text-white
                    bg-blue-700
                    hover:bg-blue-800
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
                     dark:bg-blue-700
                     dark:hover:bg-blue-700
                     dark:focus:ring-blue-800"
                    href="/law-create"><span class="fas fa-plus-circle"></span>neu</a>
                @if(request()->has('showEmpty'))
                    <a class="

                      text-white
                bg-cyan-700
                hover:bg-cyan-800
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
                 dark:bg-cyan-700
                 dark:hover:bg-cyan-700
                 dark:focus:ring-blue-800
                    " href="/laws">verstecke freie Nummern</a>
                @else
                <a
                    class="

                      text-white
                bg-cyan-700
                hover:bg-cyan-800
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
                 dark:bg-cyan-700
                 dark:hover:bg-cyan-700
                 dark:focus:ring-blue-800
                    "
                    href="/laws?showEmpty">zeige freie Nummern</a>
                    @endif

            </div>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Gesetze
            </h5>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
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
                                class="text-blue-500 hover:text-green-500"
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
                                <span class="contains-tooltip">
                                    <span class="fas fa-triangle-exclamation text-red-600"></span>
                                    <div class="tooltip">
                                        Titel des Gesetztes zu lang, {{ strlen($l->name) }} Zeichen (max. 64
                                        erlaubt)
                                    </div>
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
