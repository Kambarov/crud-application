<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    /*
     * Files will be stored to "uploads" folder in public folder
     */
    public function uploadFile(UploadedFile $file, $model)
    {
        return Storage::putFileAs("uploads/$model", $file, $file->getClientOriginalName());
    }

    public function removeFile()
    {
        if (Storage::exists($this->url))
            return Storage::delete($this->url);
    }
}
