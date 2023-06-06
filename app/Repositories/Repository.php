<?php

namespace App\Repositories;


use App\Repositories\Traits\Creation;
use App\Repositories\Traits\Deletation;
use App\Repositories\Traits\Reading;
use App\Repositories\Traits\Relationable;
use Jenssegers\Mongodb\Query\Builder;

abstract class Repository implements
    Contracts\Repository,
    Contracts\Reading,
    Contracts\Creation,
    Contracts\Deletation
{
    use Creation;
    use Deletation;
    use Reading;
    use Relationable;

    /**
     * model
     *
     * @var /Jenssegers\Mongodb\Eloquent\Model $model
     */
    protected $model;

    /**
     * builder
     *
     * @var /Jenssegers\Mongodb\Query\Builder $builder
     */
    protected Builder $builder;

    /**
     * get query builder
     */
    public function getBuilder()
    {
        return $this->builder ?? $this->getModel()::query();
    }

    /**
     * set query builder
     */
    public function setBuilder(Builder $builder): void
    {
        $this->builder = $builder;
    }

    /**
     * get model for execution
     */
    public function getModel(): string
    {
        return $this->model;
    }
}
