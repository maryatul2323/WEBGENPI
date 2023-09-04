<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', App\Http\Livewire\Guest\Dashboard\Index::class)
        ->name('guest.dashboard.index');

Route::get('/pesona-alam', App\Http\Livewire\Guest\NaturalCharm\Index::class)
        ->name('guest.naturalCharm.index');
Route::get('/pesona-alam/{travelObject:slug}', App\Http\Livewire\Guest\NaturalCharm\Details::class)
        ->name('guest.naturalCharm.details');

Route::get('/objek-wisata', App\Http\Livewire\Guest\TouristAttraction\Index::class)
        ->name('guest.touristAttraction.index');
Route::get('/objek-wisata/{travelObject:slug}', App\Http\Livewire\Guest\TouristAttraction\Details::class)
        ->name('guest.touristAttraction.details');

Route::get('/travel', App\Http\Livewire\Guest\Travel\Index::class)
        ->name('guest.travel.index');
Route::get('/travel/{travel:slug}', App\Http\Livewire\Guest\Travel\Details::class)
        ->name('guest.travel.details');

Route::get('/event', App\Http\Livewire\Guest\Event\Index::class)
        ->name('guest.event.index');
Route::get('/event/{event:slug}', App\Http\Livewire\Guest\Event\Details::class)
        ->name('guest.event.details');

Route::get('/penginapan', App\Http\Livewire\Guest\Lodging\Index::class)
        ->name('guest.lodging.index');
Route::get('/penginapan/{lodging:slug}', App\Http\Livewire\Guest\Lodging\Details::class)
        ->name('guest.lodging.details');

Route::get('/kuliner', App\Http\Livewire\Guest\Culinary\Index::class)
        ->name('guest.culinary.index');
Route::get('/kuliner/{souvenir:slug}', App\Http\Livewire\Guest\Culinary\Details::class)
        ->name('guest.culinary.details');

Route::get('/cendramata', App\Http\Livewire\Guest\Souvenir\Index::class)
        ->name('guest.souvenir.index');
Route::get('/cendramata/{souvenir:slug}', App\Http\Livewire\Guest\Souvenir\Details::class)
        ->name('guest.souvenir.details');

Route::get('/gerai/{shop:slug}', App\Http\Livewire\Guest\Shop\Details::class)
        ->name('guest.shop.details');


Route::get('login', App\Http\Livewire\Auth\Login::class)
        ->name('login');

Route::get('logout', function() {
        Auth::logout();
        return redirect()->route('login');
})->name('logout');


Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('dashboard', App\Http\Livewire\Admin\Dashboard\Index::class)
                ->name('admin.dashboard.index');
        
        Route::get('natural-charms', App\Http\Livewire\Admin\NaturalCharm\Index::class)
                ->name('admin.naturalCharm.index');
        Route::get('natural-charms/create', App\Http\Livewire\Admin\NaturalCharm\Create::class)
                ->name('admin.naturalCharm.create');
        Route::get('natural-charms/{travelObject:code}', App\Http\Livewire\Admin\NaturalCharm\Details::class)
                ->name('admin.naturalCharm.details');
        Route::get('natural-charms/{travelObject:code}/edit', App\Http\Livewire\Admin\NaturalCharm\Edit::class)
                ->name('admin.naturalCharm.edit');
        
        Route::get('tourist-attractions', App\Http\Livewire\Admin\TouristAttraction\Index::class)
                ->name('admin.touristAttraction.index');
        Route::get('tourist-attractions/create', App\Http\Livewire\Admin\TouristAttraction\Create::class)
                ->name('admin.touristAttraction.create');
        Route::get('tourist-attractions/{travelObject:code}', App\Http\Livewire\Admin\TouristAttraction\Details::class)
                ->name('admin.touristAttraction.details');
        Route::get('tourist-attractions/{travelObject:code}/edit', App\Http\Livewire\Admin\TouristAttraction\Edit::class)
                ->name('admin.touristAttraction.edit');
        
        Route::get('travels', App\Http\Livewire\Admin\Travel\Index::class)
                ->name('admin.travel.index');
        Route::get('travels/create', App\Http\Livewire\Admin\Travel\Create::class)
                ->name('admin.travel.create');
        Route::get('travels/{travel:code}', App\Http\Livewire\Admin\Travel\Details::class)
                ->name('admin.travel.details');
        Route::get('travels/{travel:code}/edit', App\Http\Livewire\Admin\Travel\Edit::class)
                ->name('admin.travel.edit');
                
        Route::get('events', App\Http\Livewire\Admin\Event\Index::class)
                ->name('admin.event.index');
        Route::get('events/create', App\Http\Livewire\Admin\Event\Create::class)
                ->name('admin.event.create');
        Route::get('events/{event:code}', App\Http\Livewire\Admin\Event\Details::class)
                ->name('admin.event.details');
        Route::get('events/{event:code}/edit', App\Http\Livewire\Admin\Event\Edit::class)
                ->name('admin.event.edit');
        
        Route::get('lodgings', App\Http\Livewire\Admin\Lodging\Index::class)
                ->name('admin.lodging.index');
        Route::get('lodgings/create', App\Http\Livewire\Admin\Lodging\Create::class)
                ->name('admin.lodging.create');
        Route::get('lodgings/{lodging:code}', App\Http\Livewire\Admin\Lodging\Details::class)
                ->name('admin.lodging.details');
        Route::get('lodgings/{lodging:code}/edit', App\Http\Livewire\Admin\Lodging\Edit::class)
                ->name('admin.lodging.edit');
        
        Route::get('souvenirs', App\Http\Livewire\Admin\Souvenir\Index::class)
                ->name('admin.souvenir.index');
        Route::get('souvenirs/create', App\Http\Livewire\Admin\Souvenir\Create::class)
                ->name('admin.souvenir.create');
        Route::get('souvenirs/{souvenir:code}', App\Http\Livewire\Admin\Souvenir\Details::class)
                ->name('admin.souvenir.details');
        Route::get('souvenirs/{souvenir:code}/edit', App\Http\Livewire\Admin\Souvenir\Edit::class)
                ->name('admin.souvenir.edit');
        
        Route::get('souvenirs/{souvenir:code}/supply-outlets/create', App\Http\Livewire\Admin\SupplyOutlet\Create::class)
                ->name('admin.supplyOutlet.create');
        Route::get('souvenirs/{souvenir:code}/supply-outlets/{supplyOutlet:code}', App\Http\Livewire\Admin\SupplyOutlet\Details::class)
                ->name('admin.supplyOutlet.details');
        Route::get('souvenirs/{souvenir:code}/supply-outlets/{supplyOutlet:code}/edit', App\Http\Livewire\Admin\SupplyOutlet\Edit::class)
                ->name('admin.supplyOutlet.edit');
        
        Route::get('settings', App\Http\Livewire\Admin\Settings\Index::class)
                ->name('admin.settings.index');
        Route::get('settings/account', App\Http\Livewire\Admin\Settings\Account::class)
                ->name('admin.settings.account');
        Route::get('settings/password', App\Http\Livewire\Admin\Settings\Password::class)
                ->name('admin.settings.password');
});

