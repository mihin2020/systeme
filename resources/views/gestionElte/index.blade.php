@extends('layouts.app')
@section('content')
<div class="layout-wrapper">


    <div class="page-content">

        @include('components.topbar')

        <div class="px-3">
            <div class="container mt-5">
                <div class="container">
                    <div class="d-flex align-items-center flex-wrap">
                        <img src="image/DGTI.png" alt="Image" class="img-fluid" style="max-width: 150px; height: auto;">
                        <h1 class="text-center mb-4 ml-3" style="font-size: 1.5rem; flex-grow: 1; text-align: left;">
                            Enregistrement des e-LTE
                        </h1>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-8">
                        <div class="card card-form">
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title">Formulaire d'enregistrement de e-LTE</h5>
                            </div>
                            @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="card-body">
                                <form action="{{ route('gestionElte.store') }}" method="POST">
                                    @csrf
                                    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                                        <!-- Colonne de gauche -->
                                        <div style="flex: 1; min-width: 300px;">
                                            <div class="mb-3">
                                                <label for="serie" class="form-label">N° série :</label>
                                                <input type="text" name="serie" class="form-control" required>
                                                @error('serie') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="numeroAppel" class="form-label">Numéro d'appel :</label>
                                                <input type="text" name="numero_appel" class="form-control" required>
                                                @error('numero_appel') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="modele" class="form-label">Modèle de radio :</label>
                                                <select name="model_elte_id" class="form-control" required>
                                                    <option value="">Sélectionner le modèle de radio</option>
                                                    @foreach ($models as $model)
                                                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('model_tetra_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="entite" class="form-label">Entité dotée :</label>
                                                <select name="entite_id" class="form-control" required>
                                                    <option value="">Sélectionner l'entité dotée</option>
                                                    @foreach ($entites as $entite)
                                                    <option value="{{ $entite->id }}">{{ $entite->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('entite_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-custom mt-3">Enregistrer</button>
                                </form>

                            </div>
                        </div>
                        <!-- Boutons pour afficher et exporter les enregistrements -->
                    </div>

                    <!-- Recherche et gestion des modèles et entités dans une carte -->
                    <div class="col-md-4">
                        <!-- Gestion des modèles -->
                        <div class="card mb-4">
                            <div class="card-header bg-warning text-dark">
                                <h5 class="card-title">Gestion des modèles de radio</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('model-elte.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nouveauModele" class="form-label">Nouveau modèle :</label>
                                        <input type="text" name="name" class="form-control" placeholder="Ex: Modèle X"
                                            required>
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-custom">Ajouter</button>
                                </form>
                                <hr>
                                <div class="mb-3">
                                    <label for="selectModele" class="form-label">Modifier ou supprimer un modèle :</label>
                                    <select id="selectModele" name="model_elte_id" class="form-control" required>
                                        <option value="">Sélectionner le modèle de radio</option>
                                        @foreach ($models as $model)
                                        <option value="{{ $model->id }}" data-name="{{ $model->name }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('model_elte_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-primary btn-sm" id="openEditModal">
                                        Modifier
                                    </button>
                                    <!-- Modal -->
                                    <!-- Un seul Modal -->
                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form id="editForm" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Modifier le modèle de radio</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Nom du modèle de radio</label>
                                                            <input type="text" class="form-control" id="modelNameInput" name="name" required>
                                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
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
                                    <button id="supprimerModele" class="btn btn-danger btn-custom" type="button">Supprimer</button>

                                    <!-- Modal de confirmation de suppression -->
                                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form id="deleteForm" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmer la suppression</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Êtes-vous sûr de vouloir supprimer ce modèle du e-LTE ? Cette action est irréversible.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
            
                            <a href="{{ route('eltes.export') }}" class="btn btn-success">
                                <i class="mdi mdi-file-excel"></i> Exporter en Excel
                            </a>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Liste des e-LTE</h4>


                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Numéro de série</th>
                                            <th>Numéro appel</th>
                                            <th>Modèle de radio</th>
                                            <th>Entité doté</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eltes as $index => $elte)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $elte->serie }}</td>
                                            <td>{{ $elte->numero_appel }}</td>
                                            <td>{{ $elte->modelElte->name ?? 'Non défini' }}</td>
                                            <td>{{ $elte->entite->name ?? 'Non défini' }}</td>

                                            <td class="d-flex mx-2">
                                                <!-- Bouton Voir -->
                                                <a href="{{ route('gestion_elte.show', $elte->id) }}" class="btn btn-info btn-sm mx-2">
                                                    Voir
                                                </a>

                                                <!-- Bouton Éditer -->
                                                <a href="{{ route('gestion_elte.edit', $elte->id) }}" class="btn btn-primary btn-sm mx-2">
                                                    Éditer
                                                </a>

                                                <!-- Formulaire de suppression -->
                                                <form action="{{ route('gestion_elte.destroy', $elte->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce e-LTE ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- content -->
        <!-- Footer Start -->
        @include('components.footer')
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectModele = document.getElementById('selectModele');
        const openEditModalBtn = document.getElementById('openEditModal');
        const modalElement = new bootstrap.Modal(document.getElementById('editModal'));
        const modelNameInput = document.getElementById('modelNameInput');
        const editForm = document.getElementById('editForm');

        openEditModalBtn.addEventListener('click', function() {
            const selectedOption = selectModele.options[selectModele.selectedIndex];

            if (!selectedOption.value) {
                alert('Veuillez sélectionner un modèle à modifier.');
                return;
            }

            const selectedId = selectedOption.value;
            const selectedName = selectedOption.getAttribute('data-name');

            // Remplir le champ input avec le nom du modèle sélectionné
            modelNameInput.value = selectedName;

            // Mettre à jour l'action du formulaire dynamiquement
            editForm.action = `/model-elte/${selectedId}`;

            // Afficher le modal
            modalElement.show();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const supprimerBtn = document.getElementById('supprimerModele');
        const selectElement = document.getElementById('selectModele');
        const deleteForm = document.getElementById('deleteForm');
        const deleteModalElement = document.getElementById('confirmDeleteModal');
        const deleteModal = new bootstrap.Modal(deleteModalElement);

        supprimerBtn.addEventListener('click', function() {
            const selectedId = selectElement.value;

            if (!selectedId) {
                alert('Veuillez sélectionner un modèle à supprimer.');
                return;
            }

            deleteForm.action = `/model-elte/${selectedId}`;
            deleteModal.show();
        });
    });
</script>