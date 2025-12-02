<div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Benutzerverwaltung
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Benutzer</th>
                            <th>E-Mail</th>
                            <th>Rolle(n)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $u)
                            <tr
                                @class([
                                     'tr-hover',
                                     'tr-active' => $u->id == $userId,
                                 ])
                                wire:click="select('{{ $u->id }}')"
                            >
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <ul class="list-group-flush">
                                        @foreach($u->getRoleNames() as $r)
                                            <li class="list-group-item">{{ $r }}</li>
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
        <div class="col-6">
            <div class="row">
                <div class="col-12">

                    <form>
                        <div class="card">
                            <div class="card-header">
                                Stammdaten
                            </div>
                            <div class="card-body">
                                <x-app.form.input model="name"/>
                                <x-app.form.input model="email"/>
                            </div>
                            <div class="card-footer">
                                <x-app.form.buttons/>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
            @if($editing)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Rollen
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label
                                                class="form-label" for="form.assigned_roles_names">
                                                zugewiesene Rollen
                                            </label>
                                            <select
                                                class="form-select"
                                                type="text"
                                                wire:model="form.assigned_roles_names"
                                                id="form.assigned_roles_names"
                                                multiple
                                                size="10"
                                            >

                                                @foreach($assignedRoles as $r)
                                                    <option value="{{ $r->name }}">
                                                        {{ $r->name }}
                                                    </option>

                                                @endforeach
                                            </select>

                                            <button class="btn btn-primary w-100"
                                                    wire:click="removeRoles"
                                            >
                                                Rollen entfernen
                                                <span class="fas fa-arrow-right"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label
                                                class="form-label" for="form.available_roles_names">
                                                verfügbare Rollen
                                            </label>
                                            <select
                                                class="form-select"
                                                type="text"
                                                wire:model="form.available_roles_names"
                                                id="form.available_roles_names"
                                                multiple
                                                size="10"
                                            >

                                                @foreach($availableRoles as $r)
                                                    <option value="{{ $r->name }}">
                                                        {{ $r->name }}
                                                    </option>

                                                @endforeach
                                            </select>

                                            <button class="btn btn-primary w-100"
                                                    wire:click="addRoles"
                                            >
                                                <span class="fas fa-arrow-left"></span>
                                                Rollen zuweisen
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
</div>
