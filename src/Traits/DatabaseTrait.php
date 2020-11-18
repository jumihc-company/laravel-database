<?php
/**
 * User: YL
 * Date: 2020/11/17
 */

namespace Jmhc\Database\Traits;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait DatabaseTrait
{
    use BuilderAssembleTrait;

    public function __construct(array $attributes = [])
    {
        // 初始前置操作
        $this->initializeBefore();

        // 实例化
        parent::__construct($attributes);

        // 初始操作
        $this->initialize();
    }

    /**
     * 初始化前置操作
     */
    protected function initializeBefore()
    {}

    /**
     * 初始化操作
     */
    protected function initialize()
    {}

    /**
     * 组装参数
     * @param array $params
     * @return Builder
     */
    public static function assemble(array $params)
    {
        /** @var Builder $builder */
        $builder = static::query();

        // 组装排序
        static::assembleOrder($builder, $params, $builder->getModel()->getFillable());
        // 组装limit分页
        static::assembleLimit($builder, $params);
        // 组装page分页
        static::assemblePage($builder, $params);

        return $builder;
    }

    /**
     * 获取蛇形复数名称
     * @return string
     */
    protected static function getSnakePluralName()
    {
        $table = preg_replace(
            '/model$/i', '', class_basename(get_called_class())
        );
        return Str::pluralStudly(Str::snake($table));
    }

    /**
     * 获取蛇形单数名称
     * @return string
     */
    protected static function getSnakeSingularName()
    {
        $table = preg_replace(
            '/model$/i', '', class_basename(get_called_class())
        );
        return Str::singular(Str::snake($table));
    }

    /**
     * {@inheritDoc}
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->getDateFormat());
    }
}