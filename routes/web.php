<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestimonialController;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Testimonial;

Route::get('/img-optimized/{path}', function ($path) {
    $fullPath = public_path('img/' . $path);
    if (!file_exists($fullPath)) abort(404);
    $cachePath = public_path('img-cache/' . md5($path) . '.webp');
    if (!file_exists($cachePath)) {
        if (!file_exists(public_path('img-cache'))) {
            mkdir(public_path('img-cache'), 0755, true);
        }
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($fullPath)->scaleDown(width: 1200)->toWebp(quality: 80);
        file_put_contents($cachePath, $image);
    }
    return response(file_get_contents($cachePath))
        ->header('Content-Type', 'image/webp')
        ->header('Cache-Control', 'public, max-age=31536000');
})->where('path', '.*');

Route::get('/', [TestimonialController::class, 'index']);
Route::get('/about', function () {
    return view('pages.about', [
        'testimonials' => Testimonial::where('is_active', true)->orderBy('sort_order')->get(),
    ]);
});

Route::get('/collection/{project}/construction', [ProjectController::class, 'showConstruction'])
    ->name('collection.construction');

Route::get('/collection', [ProjectController::class, 'index'])->name('collection.index');
Route::get('/collection/{project}', [ProjectController::class, 'show'])->name('collection.show');

Route::get('/contact', function () { return view('pages.contact'); });
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::post('/contact-messages/{id}/accept', [ContactController::class, 'accept'])->name('contact.accept');
Route::delete('/contact-messages/{id}/reject', [ContactController::class, 'reject'])->name('contact.reject');