<?php

namespace App\Repositories\Review;

interface ReviewRepositoryInterface
{
    public function getReviewByBook();
    public function BookFindReview($id);
    public function getNewReview();
    public function getBookById($id);
    public function countUserReview($id);
    public function getReviewByUser();
}
