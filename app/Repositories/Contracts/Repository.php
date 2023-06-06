<?php

namespace App\Repositories\Contracts;

use Jenssegers\Mongodb\Query\Builder;

interface Repository
{

    public function __construct();

    /**
     * get model
     */
    public function getModel();

    /**
     * set query builder
     */
    public function setBuilder(Builder $builder): void;

    /**
     * get query builder
     */
    public function getBuilder();
}
