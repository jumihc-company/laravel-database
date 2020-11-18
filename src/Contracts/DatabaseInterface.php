<?php
/**
 * User: YL
 * Date: 2020/11/17
 */

namespace Jmhc\Database\Contracts;

interface DatabaseInterface
{
    const DEFAULT_OFFSET    = 0;
    const DEFAULT_LIMIT     = 10;
    const DEFAULT_PAGE      = 1;
    const DEFAULT_PAGE_SIZE = 10;
    const DEFAULT_DIRECTION = 'asc';
}