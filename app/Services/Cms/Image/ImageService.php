<?php

namespace App\Services\Cms\Image;

use App\Models\Cms\Image\Image;
use App\Repositories\Cms\Contracts\AlbumRepositoryInterface;
use App\Repositories\Cms\Contracts\ImageRepositoryInterface;
use Illuminate\Support\Facades\Log;
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

    /**
     * @param $files
     * @param $albumName
     * @return int
     */
    public function upload($files, $albumName)
    {
        $album = $this->albumRepository->create(['name' => $albumName]);

        foreach ($files['file'] as $file) {
            $newFileName = Str::random(40);
            $newFile = $newFileName . '.' . $file->getClientOriginalExtension();
            $file->move(self::IMAGES_PATH, $newFile);
            $uploadedFileData = [
                'name' => $file->getClientOriginalName(),
                'origin' => self::IMAGES_PATH . '/' . $newFile,
                'medium' => self::IMAGES_PATH . '/' . $newFile,
                'small' => self::IMAGES_PATH . '/' . $newFile,
                'album_id' => $album->id,
                'alt_tag' => $file->getClientOriginalName()
            ];
            $this->imageRepository->create($uploadedFileData);
        }

        return $album->id;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getImagesByAlbumID(int $id)
    {
       return $this->imageRepository->getImagesByAlbumID($id);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $image = $this->imageRepository->show($id);
        try {
            $this->imageRepository->update($data, $image);
        } catch (\Exception $e) {
            Log::error('UpdateIMAGE', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }
}
