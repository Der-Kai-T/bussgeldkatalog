<div>
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
                {{ $law->name }} ({{$law->short}})
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <div class="mb-4">
                        <form class="w-full pb-4" wire:submit="submitForm">
                            <div class="row">
                                <div class="col-12">
                                    <div
                                        class="float-end {{ strlen($form->name) > 64 ? "text-red-800" : "" }}">{{ strlen($form->name) }}
                                        Zeichen
                                    </div>
                                    <x-app.form.input model="name"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <x-app.form.input model="short"/>
                                </div>
                                <div class="col-6">
                                    <x-app.form.input model="prefix"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label
                                            class="form-label" for="form.legal_field_id">
                                           Rechtsbereich
                                        </label>
                                        <select
                                            class="form-select"
                                            type="text"
                                            wire:model="form.legal_field_id"
                                            id="form.legal_field_id"
                                        >
                                            <option value="null">+++ bitte auswählen +++</option>
                                            @foreach($legalFields as $lf)
                                                <option value="{{ $lf->id }}">
                                                    {{ $lf->name }}
                                                </option>

                                            @endforeach
                                        </select>

                                        @error("form.legal_field_id")
                                        <p class="mt-2 text-sm text-danger-emphasis">{{ $message }}</p>
                                        @enderror
                                    </div>
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

                            <x-app.form.submit/>
                            <div>
                                <button
                                    wire:click="$dispatch('openModal', { component: 'app.modal.law-delete',  arguments: { lawid: '{{ $law->id }}' } })"
                                    type="button"
                                    class="btn btn-danger">
                                    <span class="fas fa-trash"></span>
                                    Gesetz löschen
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <form wire:submit="setAllLegalMaximum">
                            <div class="card">
                                <div class="card-header">
                                    Werte für alle Tatvorwürfe ändern
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label
                                                    class="form-label" for="legal_maximum_intention">
                                                    {{ __("legal_maximum_intention") }}
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="number"
                                                    wire:model="legal_maximum_intention"
                                                    id="legal_maximum_intention"
                                                >

                                                @error("legal_maximum_intention")
                                                <p class="mt-2 text-sm text-danger-emphasis">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label
                                                    class="form-label" for="legal_maximum_careless">
                                                    {{ __("legal_maximum_careless") }}
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="number"
                                                    wire:model="legal_maximum_careless"
                                                    id="legal_maximum_careless"
                                                >

                                                @error("legal_maximum_careless")
                                                <p class="mt-2 text-sm text-danger-emphasis">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>


                                    <x-app.form.submit/>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-6">
                        <form wire:submit="setAllBoolean">
                            <div class="card">
                                <div class="card-header">
                                    Werte für alle Tatvorwürfe ändern
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"

                                                    wire:model="law_print"
                                                >
                                                <label class="form-check-label"> in Bußgeldkatalog-PDF aufnehmen</label>

                                                @error("law_print")
                                                <small class="text-danger-emphasis">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div><div class="col-6">
                                            <div class="form-check form-switch">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"

                                                    wire:model="law_export"
                                                >
                                                <label class="form-check-label"> an OWI21 Exportieren</label>

                                                @error("law_export")
                                                <small class="text-danger-emphasis">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>

                                    </div>


                                    <x-app.form.submit/>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>TB-Nummer</th>
                                <th>Tatvorwurf</th>
                                <th></th>
                                <th class="text-end">Regelsatz</th>
                                <th class="text-end">Bußgeldrahmen</th>
                                <th class="text-end">gesetzl. Höchtbeträge</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allegations->sortBy("number") as $a)
                                <tr>
                                    <td>
                                        <a href="{{ route("allegation", $a->id) }}" wire:navigate
                                        >
                                            {{ $globalPrefix }}{{ $law->prefix }}{{ $a->number }}
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

                                        @if($a->export)
                                            <span class="fas fa-file-csv"></span>
                                        @else
                                            <span class="fa-layers fa-fw">
                                                <i class="fas fa-file-csv icon-disabled"></i>
                                                <i class="fas fa-slash icon-disabled-slash"></i>
                                                <i class="fas fa-slash icon-disabled-slash rotate-90"></i>
                                            </span>
                                        @endif

                                        @if($a->print)
                                            <span class="fas fa-print"></span>
                                        @else
                                            <span class="fa-layers fa-fw">
                                                <i class="fas fa-print icon-disabled"></i>
                                                <i class="fas fa-slash icon-disabled-slash"></i>
                                                <i class="fas fa-slash icon-disabled-slash rotate-90"></i>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if(!empty($a->fine_regular))
                                            {{ number_format($a->fine_regular, 2,",",".") }}&nbsp;€
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if(!empty($a->fine_min))
                                            {{ number_format($a->fine_min, 2, ",",".") }}&nbsp;€
                                        @endif

                                        @if(!empty($a->fine_max))
                                            bis {{ number_format($a->fine_max, 2, ",",".") }}&nbsp;€
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
            </div>
        </div>
