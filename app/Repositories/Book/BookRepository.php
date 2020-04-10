<?php

namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\BaseRepository;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    public function getModel()
    {
        return Book::class;
    }

    public function getAllBook()
    {
        return $this->model
            ->orderBY('created_at', 'desc')
            ->with(['creator', 'category'])
            ->get();
    }
}
