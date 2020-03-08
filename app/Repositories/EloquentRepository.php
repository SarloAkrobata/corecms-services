<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Repository
 *
 * @package App\Repositories
 */
abstract class EloquentRepository implements RepositoryInterface
{
    /** @var Model  */
    protected $model;
    /**
     * EloquentRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * @inheritdoc
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    /**
     * @inheritdoc
     */
    public function update(array $data, $model)
    {
        return $model->update($data);
    }
    /**
     * @inheritdoc
     */
    public function delete($model)
    {
        return $this->model->destroy($model->getAttribute('id'));
    }
    /**
     * @inheritdoc
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    /**
     * @inheritdoc
     */
    public function getModel()
    {
        return $this->model;
    }
    /**
     * @inheritdoc
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
    public function with($relations)
    {
        return $this->model->with($relations);
    }
    /**
     * @inheritdoc
     */
    public function store(array $data)
    {
        return $this->model->save($data);
    }
    /**
     * @inheritdoc
     */
    public function updateOrCreate(array $where, array $data)
    {
        return $this->model->updateOrCreate($where, $data);
    }
    /**
     * @inheritdoc
     */
    public function firstOrCreate(array $where, array $data)
    {
        return $this->model->firstOrCreate($where, $data);
    }
    /**
     * @inheritdoc
     */
    public function where($param, $operator, $value)
    {
        return $this->model->where($param, $operator, $value)->get();
    }

}
