<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    /**
     * fillable data model.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * paginationable.
     *
     * @var bool
     */
    protected bool $paginationable = false;

    /**
     * optional pagination.
     *
     * @var bool
     */
    protected bool $optionalPagination = true;

    /**
     * sortable.
     *
     * @var bool
     */
    protected bool $sortable = true;

    /**
     * field allowed to sort.
     *
     * @var array
     */
    protected array $sortAllowedFields = ['id'];

    /**
     * default sort field.
     *
     * @var string | null
     */
    protected string | null $defaultSortField = null;

    /**
     * relationable.
     *
     * @var bool
     */
    protected bool $relationable = true;

    /**
     * field allowed to get relation.
     *
     * @var array
     */
    protected array $relationAllowed = [];

    /**
     * relation autoload.
     *
     * @var mixed
     */
    protected $relation = null;

    /**
     * initialisation model
     *
     * @var App\Models\User
     */
     public function __construct()
     {
         $this->model = User::class;
     }
}
