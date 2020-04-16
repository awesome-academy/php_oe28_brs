<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusReview;
use App\Http\Controllers\Controller;
use App\Mail\ApprovedSendEmail;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    protected $reviewRepo;

    public function __construct(ReviewRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }

    public function index()
    {
        $reviews = $this->reviewRepo->getAll();

        return view('admin.review.list-review', compact('reviews'));
    }

    public function approved($id)
    {
        $review = $this->reviewRepo->find($id);
        $status = $this->reviewRepo->update($id, [
            'status' => StatusReview::StatusActive,
        ]);

        if ($status == true) {
            $details = [
                'title' => trans('messages.approved_review') . $review->book->name,
                'body' => trans('messages.approved_success'),
            ];

            Mail::to($review->user->email)->send(new ApprovedSendEmail($details));
        }

        return redirect()->route('reviews.list')->with([
            'success' => trans('messages.success')
        ]);
    }
}
