<x-app.modal.default title="Gesetz löschen">
    <p class="text-sm text-gray-400">
        Sind Sie sicher, dass Sie das Gesetz<br>
        <span class="bg-blue-800 text-white px-1">{{ $law->name }} ({{ $law->short }})</span>
        <br>
        löschen möchten. Dadurch werden alle verknüpften Tatbestände ebenfalls
    gelöscht. Dies kann nicht mehr rückgängig gemacht werden.
    </p>
</x-app.modal.default>
