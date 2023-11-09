<?php
    use App\Http\Controllers\trainercontroller;
    use App\Http\Controllers\membercontroller;

    use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


route::get('trainer', [trainercontroller::class, 'index' ])->name('trainer_list');
route::post('trainer', [trainercontroller::class, 'store' ])->name('trainer_add');
route::delete('trainer/{id}', [trainercontroller::class, 'destroy' ])->name('delete_trainer');
// route::get('trainer/{id}/edit', [trainercontroller::class, 'edit' ])->name('edit_trainer');
// route::put('trainer/{id}', [trainercontroller::class, 'update' ])->name('update_trainer');

route::get('traineredit/{id}', [trainercontroller::class, 'edit' ])->name('edit_trainer');
Route::put('trainer/{id}', [trainercontroller::class, 'update' ])->name('update');


route::get('member', [membercontroller::class, 'index' ])->name('member_list');
route::post('member', [membercontroller::class, 'store' ])->name('member_add');

route::get('member/{id}',[membercontroller::class, 'edit'])->name('edit_member');  
route::put('update/{id}', [membercontroller::class, 'update' ])->name('update_member');

route::delete('member/{id}', [membercontroller::class, 'destroy' ])->name('delete_member');





