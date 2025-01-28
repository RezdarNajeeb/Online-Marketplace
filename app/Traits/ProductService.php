<?php

namespace App\Traits;

trait ProductService
{
    public function uploadImage($image)
    {
        $hashed = $image->hashName();
        $image->move(public_path('products'), $hashed);
        return $hashed;
    }

    public function deleteImage($imagePath): void
    {
        if(file_exists(public_path('products/' . $imagePath))) {
            unlink(public_path('products/' . $imagePath));
        }
    }
}
