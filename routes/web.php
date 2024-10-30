use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']); // Homepage route
Route::get('/about', [PageController::class, 'about']); // About page route
