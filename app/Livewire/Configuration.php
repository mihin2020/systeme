<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entite;

class Configuration extends Component
{
    public $name;
    public $entites;
    public $entiteId = null; // Pour savoir si c'est édition ou création

    public function mount()
    {
        $this->loadEntites();
    }

    public function loadEntites()
    {
        $this->entites = Entite::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:entites,name,' . $this->entiteId,
        ]);

        if ($this->entiteId) {
            $entite = Entite::findOrFail($this->entiteId);
            $entite->update([
                'name' => $this->name,
            ]);

            session()->flash('success', 'Entité mise à jour avec succès.');
        } else {
            Entite::create([
                'name' => $this->name,
            ]);

            session()->flash('success', 'Entité enregistrée avec succès.');
        }

        $this->resetForm();
        $this->loadEntites();
    }

    public function edit($id)
    {
        $entite = Entite::findOrFail($id);
        $this->entiteId = $entite->id;
        $this->name = $entite->name;
    }

    public function delete($id)
    {
        $entite = Entite::findOrFail($id);
        $entite->delete();

        session()->flash('success', 'Entité supprimée avec succès.');
        $this->loadEntites();
    }

    public function resetForm()
    {
        $this->entiteId = null;
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.configuration');
    }
}
