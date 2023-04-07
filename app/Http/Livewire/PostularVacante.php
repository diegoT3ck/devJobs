<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;

    protected $rules = [
        'cv'    => 'required|mimes:pdf'
    ];
    public function mount(Vacante $vacante) {
        // dd($vacante);
        $this->vacante = $vacante;

    }
    public function postularme() {
        // validar datos
        $datos = $this->validate();
        
        // guardar la imagen
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '' ,$cv);
        
        // Crear el candidato para la vacante
        $this->vacante->candidatos()->create([
        
            // No se requiere la vacante, porque ya esta definido en la relacion
            'user_id'   => auth()->user()->id,
            'cv'        => $datos['cv'],
        ]);
        // Crear notificacion y enviar el email
        $this->vacante->reclutador->notify(new NuevoCandidato(
            $this->vacante->id, $this->vacante->titulo, auth()->user()->id) );

        // Mosrear al usuario mensaje
        session()->flash('mensaje', 'Se envio correctamente tu información, mucha suerte!');



    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
