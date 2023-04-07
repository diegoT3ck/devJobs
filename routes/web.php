<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'] )->middleware(['auth', 'verified', 'rol.reclutador'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class, 'create'] )->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'] )->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');
Route::get('/candidtos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');
// Notificaciones
Route::get('notificaciones', NotificacionController::class)->middleware('auth', 'verified', 'rol.reclutador')->name('notificaciones');
require __DIR__.'/auth.php';
/*
sail php artisan make:migration create_vacante_table --create=vacantes
sail artisan make:seeder CategoriaSeeder
sail artisan db:seed
sail artisan make:livewire MostrarVacantes
sail artisan vendor:publish --tag=laravel-pagination
sail artisan make:policy VacantePolicy --model=Vacante
@stack('scripts) <- app.blade
    @push('scripts) <- Component / page
    @endPuch
@can('create', App\Models\Vacante::class)
        <p>Este es un reclutador</p>
@else
        <livewire:postular-vacante/>
@endcan
sail artisan make:notification NuevoCandidato
sail artisan make:controller NotificacionController --invokable Controlador con un solo metodo

        $vacantes = Vacante::when($this->termino, function ($query) {
            $query->where('titulo', 'LIKE', '%'. $this->termino .'%');
        })
        ->when($this->termino, function($query) {
            $query->orWhere('empresa', 'LIKE', '%'. $this->termino .'%');
        })
        ->when($this->categoria, function($query) {
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function($query) {
            $query->where('salario_id', $this->salario);
        })
        
*/