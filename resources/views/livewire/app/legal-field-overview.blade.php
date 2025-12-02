<div>
    <div class="row">
        <div class="col-8">


            <div class="card">
                <div class="card-header">

                    <h5 class="card-title">
                        Rechtsbereiche
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nr</th>
                            <th>Bezeichnung</th>
                            <th>Zugeordnete Gesetze</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($legalFields as $lf)
                            <tr
                                @if($activeUuid == $lf->id)
                                    class="tr-active"
                                @else
                                    class="tr-hover"
                                @endif
                                wire:click="select('{{ $lf->id }}')"

                            >
                                <td>{{ $lf->number }}</td>
                                <td>{{ $lf->name }}</td>
                                <td>
                                    <ul>
                                        @foreach($lf->laws as $l)
                                            <li>{{ $l->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-4">
            <form wire:submit="submitForm">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            @if($editing)
                                Rechtsbreich bearbeiten
                            @else
                                neuen Rechtsbereich anlegen
                            @endif

                        </h5>
                    </div>
                    <div class="card-body">
                        <x-app.form.input model="number" type="number"/>
                        <x-app.form.input model="name"/>
                    </div>
                    <div class="card-header">
                        <button class="btn btn-primary float-end"
                                type="submit"
                        />
                        <span class="fas fa-save"></span>
                        {{ __("Save") }}

                        <button class="btn btn-secondary"
                                type="button"
                                wire:click="abortForm"
                        />
                        <span class="fas fa-times-circle"></span>
                        {{ __("Abort") }}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
