<?php

namespace App\Repositories\Review;

use App\Enums\Paginate;
use App\Models\Book;
use App\Models\Review;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    public function getModel()
    {
        return Review::class;
    }

    public function getReviewByBook()
    {
        return $this->model->groupBy('book_id')
            ->select('book_id', DB::raw('count(*) as total'))
            ->orderBy('total', 'desc')
            ->paginate(Paginate::Page);
    }

    public function BookFindReview($id)
    {
          return $this->model->where('book_id', $id)
             ->paginate(Paginate::Page);
    }

    public function getNewReview()
    {
        return $this->model
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function getBookById($id)
    {
        return Book::find($id);
    }

    public function countUserReview($id)
    {
        return $this->model
            ->where('book_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();
    }
}
