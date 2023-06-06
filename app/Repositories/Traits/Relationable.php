<?php

namespace App\Repositories\Traits;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

trait Relationable
{
    /**
     * relationable.
     *
     * @var bool
     */
    protected bool $relationable = false;

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
     * apply relation.
     */
    protected function applyRelation(Request $request, $builder): void
    {
        $fields = $this->getRelationFields($request);

        if ($this->relationable && count($fields) > 0) {
            $builder->with($fields);
        }
    }

    /**
     * get relation field.
     */
    protected function getRelationFields(Request $request): array
    {
        $fields = [];
        if ($request->has('with')) {
            $relations = $request->with;
            if (!is_array($relations)) {
                $relations = explode(',', $relations);
            } else {
                $request['with'] = implode(',', $relations);
            }

            foreach ($relations as $key => $relation) {
                $allowed = [];

                foreach ($this->relationAllowed as $key => $value) {
                    if (is_int($key)) {
                        array_push($allowed, $value);
                    } else {
                        array_push($allowed, $key);
                    }
                }

                if (in_array($relation, $allowed)) {
                    if (isset($this->relationAllowed[$relation])) {
                        array_push($fields, $this->relationAllowed[$relation]);
                    } else {
                        array_push($fields, $relation);
                    }
                } else {
                    throw new BadRequestHttpException("{$relation} is not allowed relation");
                }
            }
        } elseif (isset($this->relation) && is_string($this->relation)) {
            $fields = [$this->relation];
        } elseif (isset($this->relation) && is_array($this->relation)) {
            $fields = $this->relation;
        }

        return $fields;
    }
}
