<div>
    <div class="relative rounded-xl border border-neutral-200 dark:border-neutral-700">
        <div
            class="p-6 w-full h-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 sticky top-0">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                neues Gesetz anlegen
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
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="date" model="valid_from"/>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <x-app.form.input type="date" model="valid_until"/>
                        </div>

                    </div>

                    <x-app.form.submit/>



                </form>
            </div>
        </div>
    </div>
</div>
