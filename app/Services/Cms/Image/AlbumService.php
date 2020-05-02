<?php

namespace App\Services\Cms\Image;

use App\Models\Cms\Image\Album;
use App\Repositories\Cms\Contracts\AlbumRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class AlbumService
{
    private $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    /**
     * @param $data
     * @return bool
     */
    public function createAlbum($data): bool
    {
        try {
            $this->albumRepository->create($data);
        } catch (\Exception $e) {
            Log::error('CreateALBUM', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }

    /**
     * @param array $data
     * @return int
     */
    public function createAlbumAndReturnId(array $data): int
    {
        try {
            $album = $this->albumRepository->create($data);
        } catch (\Exception $e) {
            Log::error('CreateALBUM', [$e->getMessage(), $e->getTrace()]);

            return 0;
        }

        return $album->id;
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateAlbum(int $id, array $data): bool
    {
        $album = $this->albumRepository->show($id);
        try {
            $this->albumRepository->update($data, $album);
        } catch (\Exception $e) {
            Log::error('UpdateALBUM', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }

    /**
     * @param int $albumId
     * @return Album
     */
    public function getAlbum(int $albumId): Album
    {
        return $this->albumRepository->show($albumId);
    }

    /**
     * @return Collection
     */
    public function getAllAlbums(): Collection
    {
        return $this->albumRepository->all();
    }

    /**
     * @param int $albumId
     * @return bool
     */
    public function deleteAlbum(int $albumId): bool
    {
        $album = $this->albumRepository->show($albumId);
        try {
            $this->albumRepository->delete($album);
        } catch (\Exception $e) {
            Log::error('DeleteALBUM', [$e->getMessage(), $e->getTrace()]);

            return false;
        }

        return true;
    }
}
