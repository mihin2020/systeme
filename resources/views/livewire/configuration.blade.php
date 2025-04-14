<div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-8">
                @if (session()->has('success'))
                <div class="alert alert-success" id="success-alert">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(() => document.getElementById('success-alert')?.remove(), 4000);
                </script>
                @endif

                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title">Liste des entités</h4>
                        <table class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom de l'entité</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entites as $index => $entite)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $entite->name }}</td>
                                    <td>
                                        <!-- Bouton pour ouvrir le modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $entite->id }}">
                                            Éditer
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal{{ $entite->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $entite->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('configuration.update', $entite->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $entite->id }}">Modifier l'entité</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name{{ $entite->id }}" class="form-label">Nom de l'entité</label>
                                                                <input type="text" class="form-control" id="name{{ $entite->id }}" name="name" value="{{ $entite->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Formulaire de suppression -->
                                        <form action="{{ route('configuration.destroy', $entite->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entité ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="save">
                            <label for="">Entité à Doter</label>
                            <input type="text" wire:model.defer="name" class="form-control" placeholder="Nom de l'entité">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>