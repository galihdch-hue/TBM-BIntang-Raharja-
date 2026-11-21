<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

class ImageStorage
{
    public const MAX_UPLOAD_SIZE_KB = 10240;

    public function store(UploadedFile $upload, string $directory): string
    {
        if (! extension_loaded('gd') || ! function_exists('imagewebp')) {
            throw new RuntimeException('Server belum mendukung pemrosesan gambar WebP.');
        }

        $image = $this->decode($upload);

        try {
            $image = $this->orient($image, $upload);
            $resizedImage = $this->resize($image);
        } finally {
            imagedestroy($image);
        }

        try {
            $contents = $this->encodeWebp($resizedImage);
        } finally {
            imagedestroy($resizedImage);
        }

        $path = trim($directory, '/').'/'.Str::uuid().'.webp';

        if (! Storage::disk('public')->put($path, $contents)) {
            throw new RuntimeException('Gambar gagal disimpan. Silakan coba kembali.');
        }

        return $path;
    }

    public function delete(?string $path): void
    {
        if (! $this->isManagedPath($path)) {
            return;
        }

        $disk = Storage::disk('public');

        if ($disk->exists($path) && ! $disk->delete($path)) {
            Log::warning('Gagal menghapus gambar yang sudah tidak digunakan.', [
                'path' => $path,
            ]);
        }
    }

    public function url(?string $path): ?string
    {
        if ($path === null || $path === '') {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (Str::startsWith($path, 'images/')) {
            return asset($path);
        }

        if (! str_contains($path, '/')) {
            return asset('images/'.$path);
        }

        return asset('storage/'.$path);
    }

    private function decode(UploadedFile $upload): \GdImage
    {
        $contents = $upload->get();
        $image = $contents === '' ? false : @imagecreatefromstring($contents);

        if (! ($image instanceof \GdImage)) {
            throw new RuntimeException('File yang diunggah tidak dapat dibaca sebagai gambar.');
        }

        return $image;
    }

    private function orient(\GdImage $image, UploadedFile $upload): \GdImage
    {
        if ($upload->getMimeType() !== 'image/jpeg' || ! function_exists('exif_read_data')) {
            return $image;
        }

        $metadata = @exif_read_data($upload->getRealPath());
        $orientation = is_array($metadata) ? (int) ($metadata['Orientation'] ?? 1) : 1;
        $rotation = match ($orientation) {
            3 => 180,
            5, 6 => -90,
            7, 8 => 90,
            default => 0,
        };
        $flip = match ($orientation) {
            2, 5, 7 => IMG_FLIP_HORIZONTAL,
            4 => IMG_FLIP_VERTICAL,
            default => null,
        };
        $orientedImage = $image;

        if ($rotation !== 0) {
            $background = imagecolorallocatealpha($image, 0, 0, 0, 127);
            $rotatedImage = imagerotate($image, $rotation, $background);

            if (! ($rotatedImage instanceof \GdImage)) {
                throw new RuntimeException('Orientasi gambar gagal diproses.');
            }

            $orientedImage = $rotatedImage;
        }

        if ($flip !== null && ! imageflip($orientedImage, $flip)) {
            if ($orientedImage !== $image) {
                imagedestroy($orientedImage);
            }

            throw new RuntimeException('Orientasi gambar gagal diproses.');
        }

        if ($orientedImage !== $image) {
            imagedestroy($image);
        }

        return $orientedImage;
    }

    private function resize(\GdImage $image): \GdImage
    {
        $sourceWidth = imagesx($image);
        $sourceHeight = imagesy($image);
        $scale = min(1, 1920 / $sourceWidth, 1920 / $sourceHeight);
        $width = max(1, (int) round($sourceWidth * $scale));
        $height = max(1, (int) round($sourceHeight * $scale));
        $resizedImage = imagecreatetruecolor($width, $height);

        if (! ($resizedImage instanceof \GdImage)) {
            throw new RuntimeException('Gambar gagal disiapkan untuk kompresi.');
        }

        imagealphablending($resizedImage, false);
        imagesavealpha($resizedImage, true);
        $transparent = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);

        if (! imagefill($resizedImage, 0, 0, $transparent)
            || ! imagecopyresampled(
                $resizedImage,
                $image,
                0,
                0,
                0,
                0,
                $width,
                $height,
                $sourceWidth,
                $sourceHeight,
            )) {
            imagedestroy($resizedImage);

            throw new RuntimeException('Gambar gagal diubah ukurannya.');
        }

        return $resizedImage;
    }

    private function encodeWebp(\GdImage $image): string
    {
        ob_start();

        try {
            $encoded = imagewebp($image, null, 80);
            $contents = ob_get_contents();
        } finally {
            ob_end_clean();
        }

        if (! $encoded || ! is_string($contents) || $contents === '') {
            throw new RuntimeException('Gambar gagal dikompres ke format WebP.');
        }

        return $contents;
    }

    private function isManagedPath(?string $path): bool
    {
        return is_string($path) && Str::startsWith($path, [
            'uploads/activities/',
            'uploads/news/',
            'uploads/gallery/',
            'uploads/about/',
            'uploads/home/',
            'uploads/contacts/',
            'uploads/partners/',
        ]);
    }
}
