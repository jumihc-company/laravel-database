<?php
/**
 * User: YL
 * Date: 2020/11/17
 */

namespace Jmhc\Database\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Jmhc\Support\Traits\InstanceTrait;

/**
 * 主键倒序作用域
 * @package Jmhc\Database\Scopes
 */
class PrimaryKeyDescScope implements Scope
{
    use InstanceTrait;

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->orderByDesc($model->getKeyName());
    }
}