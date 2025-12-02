<div>
    <form class="w-full pb-4" wire:submit="submitForm">
        <div class="card">
            <div
                class="card-header">
                <div class="float-end">
                    {{ $law->department }}
                    @if(!empty($law->lead_office))
                        (FF {{ $law->lead_office }})
                    @endif
                </div>
                <h5 class="card-title">
                    {{ $law->name }} ({{$law->short}}) Prefix {{ $law->prefix }} - Tatbestand bearbeiten
                </h5>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-4">
                        <x-app.form.input model="number"/>
                    </div>
                    <div class="col-8">
                        <x-app.form.input model="quote"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <x-app.form.textarea model="text"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <x-app.form.input type="number" model="fine_min"/>
                    </div>
                    <div class="col-3">
                        <x-app.form.input type="number" model="fine_max"/>
                    </div>
                    <div class="col-3">
                        <x-app.form.input type="number" model="fine_regular"/>
                    </div>
                    <div class="col-3"></div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <x-app.form.input type="number" model="legal_maximum_intention"/>
                    </div>
                    <div class="col-3">
                        <x-app.form.input type="number" model="legal_maximum_careless"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <x-app.form.input type="date" model="valid_from"/>
                    </div>
                    <div class="col-3">
                        <x-app.form.input type="date" model="valid_until"/>
                    </div>
                    <div class="col-6">
                        <x-app.form.select model="infringement_id" :options="$infringements"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <x-app.form.checkbox model="print" label="in Bußgeldkatalog-PDF aufnehmen" optional/>
                        <x-app.form.checkbox model="export" label="an OWI21 Exportieren" optional/>
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <x-app.form.submit/>

                <a href="{{ route("law", $law->id) }}"
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
