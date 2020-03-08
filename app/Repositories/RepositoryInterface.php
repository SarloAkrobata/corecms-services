<?php

namespace App\Repositories;
/**
 * Interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);
    /**
     * @param array $data
     * @param $model
     * @return mixed
     */
    public function update(array $data, $model);
    /**
     * @param $model
     * @return mixed
     */
    public function delete($model);
    /**
     * @param $id
     * @return mixed
     */
    public function show($id);
    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);
    /**
     * @param array $where
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate(array $where, array $data);
    /**
     * @param array $where
     * @param array $data
     * @return mixed
     */
    public function firstOrCreate(array $where, array $data);

    /**
     * @param $param
     * @param $operator
     * @param $value
     * @return mixed
     */
    public function where($param, $operator, $value);
}
