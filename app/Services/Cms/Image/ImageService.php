<?php

namespace App\Services\Cms\Image;

use App\Repositories\Cms\Contracts\AlbumRepositoryInterface;
use App\Repositories\Cms\Contracts\ImageRepositoryInterface;
use Illuminate\Support\Str;

class ImageService
{
    private $imageRepository;
    private $albumRepository;
    private const IMAGES_PATH = 'uploads';
    private const DEFUALT_ALBUM = 'My First Album';

    public function __construct(ImageRepositoryInterface $imageRepository, AlbumRepositoryInterface $albumRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->albumRepository = $albumRepository;
    }

    public function upload($file, $albumId)
    {
        $newFileName = Str::random(40);
        $newFile = $newFileName . '.' . $file->getClientOriginalExtension();
        $file->move(self::IMAGES_PATH, $newFile);
        $uploadedFileData = [
            'name' => $file->getClientOriginalName(),
            'origin' => self::IMAGES_PATH . '/' . $newFile,
            'medium' => self::IMAGES_PATH . '/' . $newFile,
            'small' => self::IMAGES_PATH . '/' . $newFile,
            'album_id' => $albumId
        ];
        $this->imageRepository->create($uploadedFileData);
    }

    public function createAlbum($album)
    {
        if (empty($album)) {
            $album = self::DEFUALT_ALBUM;
        }

        return $this->albumRepository->create(['name' => $album]);
    }
}
