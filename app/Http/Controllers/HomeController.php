<?php

namespace App\Http\Controllers;

use App\Repositories\Review\ReviewRepositoryInterface;

class HomeController extends Controller
{
    protected $reviewRepo;

    public function __construct(ReviewRepositoryInterface $reviewRepo)
    {
        $this->reviewRepo = $reviewRepo;
    }

    public function index()
    {
        $categories = $this->reviewRepo->getAllCategory();
        $reviews = $this->reviewRepo->getReviewByBook();

        return view('index', compact(['categories', 'reviews']));
    }

}
