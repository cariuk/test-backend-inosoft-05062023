<?php

namespace RepositoryPatternLaravel;

use App\Repositories\Contracts\SoftDeletation as SoftDeletationContrac;
use App\Repositories\Repository;
use App\Repositories\Traits\SoftDeletation;

abstract class RepositorySoftDelete extends Repository implements SoftDeletationContrac
{
    use SoftDeletation;
}
