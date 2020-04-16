<?php

namespace App\Http\Controllers;

use App\Enums\StatusReview;
use App\Http\Requests\ReviewRequest;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $reviewRepo;

    public function __construct(ReviewRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }

    public function index()
    {
        $reviews = $this->reviewRepo->getReviewByUser();

        return view('review-manage', compact('reviews'));
    }

    public function review($id)
    {
        $reviews = $this->reviewRepo->BookFindReview($id);
        $newReviews = $this->reviewRepo->getNewReview();

        return view('review', compact(['reviews', 'newReviews']));
    }

    public function createReview($id)
    {
        $book = $this->reviewRepo->getBookById($id);

        return view('add-review', compact('book'));
    }

    public function saveReview(ReviewRequest $request, $id)
    {
        $data = [
            'book_id' => $id,
            'user_id' => Auth::user()->id,
            'content' => $request->review,
            'status' => StatusReview::StatusInactive,
        ];
        $count = $this->reviewRepo->countUserReview($id);

        if ($count == StatusReview::StatusInactive) {
            $this->reviewRepo->create($data);

            return redirect()->route('reviews.index');
        } else {
            return redirect()->route('reviews.index');
        }
    }

    public function showReview($id)
    {
        $review = $this->reviewRepo->find($id);

        return view('review-detail', compact('review'));
    }
}
