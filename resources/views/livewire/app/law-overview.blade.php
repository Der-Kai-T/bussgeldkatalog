<div>
    <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div
            class="p-6 w-full h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
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
                @foreach($laws as $l)
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
                        <td>{{ $l->name }}</td>
                        <td>{{ $l->allegations->count() }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
