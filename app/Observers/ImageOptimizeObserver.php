<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Log;

class ImageOptimizeObserver
{
    protected array $imageFields = [
        'cover_image',
        'gallery_images',
    ];

    public function created(Project $project): void
    {
        $this->convertImages($project);
    }

    public function updated(Project $project): void
    {
        $this->convertImages($project);
    }

    protected function convertImages(Project $project): void
    {
        $manager = new ImageManager(new Driver());
        $changed = false;

        foreach ($this->imageFields as $field) {
            $value = $project->getOriginal($field) ?? $project->$field;

            if (is_array($value)) {
                $newPaths = [];
                foreach ($value as $path) {
                    $converted = $this->convertToWebp($manager, $path);
                    $newPaths[] = $converted ?? $path;
                    if ($converted) $changed = true;
                }
                $project->$field = $newPaths;

            } elseif (is_string($value) && $value !== '') {
                $converted = $this->convertToWebp($manager, $value);
                if ($converted) {
                    $project->$field = $converted;
                    $changed = true;
                }
            }
        }

        if ($changed) {
            $project->saveQuietly();
        }
    }

    protected function convertToWebp(ImageManager $manager, string $relativePath): ?string
    {
        // Lewati jika sudah WebP
        if (str_ends_with(strtolower($relativePath), '.webp')) {
            return null;
        }

        $fullPath = Storage::disk('public')->path($relativePath);

        if (!file_exists($fullPath)) {
            return null;
        }

        try {
            $webpPath = preg_replace('/\.(jpg|jpeg|png|gif|bmp)$/i', '.webp', $relativePath);
            $webpFullPath = Storage::disk('public')->path($webpPath);

            $dir = dirname($webpFullPath);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            $manager->read($fullPath)
                    ->toWebp(85)
                    ->save($webpFullPath);

            Storage::disk('public')->delete($relativePath);

            return $webpPath;

        } catch (\Throwable $e) {
            logger()->error("ImageOptimizeObserver: Gagal konversi {$relativePath} — " . $e->getMessage());
            return null;
        }
    }
}