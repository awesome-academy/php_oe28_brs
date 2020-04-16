@extends('layouts.app')

@section('title', trans('messages.review'))

@section('content')
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="wn__sidebar">
                        <aside class="widget recent_widget">
                            <h3 class="widget-title">{{ trans('messages.new_review') }}</h3>
                            <div class="recent-posts">
                                <ul>
                                    @foreach ($newReviews as $newReview)
                                        <li>
                                            <div class="post-wrapper d-flex">
                                                <div class="thumb">
                                                    <a href="#"><img src="{{ $newReview->book->image }}"></a>
                                                </div>
                                                <div class="content">
                                                    <p><a href="#">{{ $newReview->book->title }}</a></p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="blog-page">
                        <div class="page__header">
                            <h2>{{ trans('messages.book_review') }}</h2>
                        </div>
                        @foreach ($reviews as $review)
                            <article class="blog__post flex-wrap">
                                <div class="content">
                                    <h4><a href="{{ route('reviews.show', $review->id) }}">{{ $review->book->name }}</a></h4>
                                    <ul class="post__meta">
                                        <li>{{ trans('messages.creator') }}: {{ $review->user->full_name }}</li>
                                        <li class="post_separator">/</li>
                                        <li>{{ trans('messages.created_at') }}: {{ $review->created_at }}</li>
                                        <li class="post_separator">/</li>
                                        <li>
                                            {{ $review->favorites->count() }}
                                            <a href="#"><i class="far fa-heart text-danger"></i></a>
                                        </li>
                                    </ul>
                                    <p>{{ $review->book->title }}</p>
                                    <div class="blog__btn">
                                        <a href="{{ route('reviews.show', $review->id) }}">{{ trans('messages.read_more') }}</a>
                                    </div>
                                </div>
                                <hr>
                            </article>
                        @endforeach
                    </div>
                    <div class="mt-5">
                        {!! $reviews->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
