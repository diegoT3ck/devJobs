<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    
        @forelse($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="leading-10 space-y-8">
                <a href="{{route('vacantes.show', $vacante)}}" class="text-xl font-bold">
                    {{$vacante->titulo}}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500">Ultimo dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
            </div>
            <div class="flex flex-col md:flex-row items-stretch gap-3 text-center mt-5 md:mt-0">
                <a href="{{route('candidatos.index', $vacante->id )}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    {{ $vacante->candidatos->count() }} Candidatos
                </a>
                <a href="{{route('vacantes.edit', $vacante->id )}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    Editar
                </a>
                <button 
                wire:click="$emit('prueba', {{$vacante->id}})"
                class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    Eliminar
                </a>
            </div>
    
        </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>
    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('prueba', vacanteID => {
        Swal.fire({
        title: 'Eliminar Vacante?',
        text: "Una vacante eliminada no se puede recuperar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
            // Eliminar la vacante
            Livewire.emit('eliminarVacante', vacanteID)
          Swal.fire(
            'Eliminada!',
            'Eliminado correctamente.',
            'success'
          )
        }
      })

    })

</script>
  
@endpush