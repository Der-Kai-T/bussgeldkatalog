<div>
    <form class="w-full pb-4" wire:submit="submitForm">
        <div class="card">
            <div
                class="card-header">

                <h5 class="card-title">
                    neues Gesetz anlegen
                </h5>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <div
                            class="float-end {{ strlen($form->name) > 64 ? "text-red-800" : "" }}">{{ strlen($form->name) }}
                            Zeichen
                        </div>
                        <x-app.form.input model="name"/>
                    </div>
                    <div class="col-6">
                        <x-app.form.input model="short"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <x-app.form.input model="prefix"/>
                    </div>
                    <div class="col-4">
                        <x-app.form.input model="department"/>
                    </div>
                    <div class="col-4">
                        <x-app.form.input model="lead_office"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <x-app.form.input type="date" model="valid_from"/>
                    </div>
                    <div class="col-6">
                        <x-app.form.input type="date" model="valid_until"/>
                    </div>
                </div>



            </div>
            <div class="card-footer">
                <x-app.form.submit/>

                <a href="{{ route("laws") }}"
                   wire:navigate
                   class="btn btn-secondary"
                >
                    <span class="fas fa-times"></span>
                    {{ __("Abort") }}
                </a>
            </div>

        </div>
    </form>
</div>
