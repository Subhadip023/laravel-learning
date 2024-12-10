<?php

namespace App\Helpers;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator
{
    /**
     * Create a new custom paginator.
     *
     * @param  array  $items
     * @param  int  $perPage
     * @param  int  $currentPage
     * @param  int  $total
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function paginate(array $items, $perPage = 15, $currentPage = 1, $total = null)
    {
        $currentPage = $currentPage ?: (Paginator::resolveCurrentPage() ?: 1);

        $total = $total ?: count($items);

        $offset = ($currentPage - 1) * $perPage;
        $items = array_slice($items, $offset, $perPage);

        return new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );
    }
}
