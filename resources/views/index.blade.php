@extends('layouts.app')

@section('title', trans('menus.home'))

@section('content')
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="wedget__categories poroduct--cat">
                            <h3 class="wedget__title">{{ trans('messages.category') }}</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="#">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab__container">
                                <div class="shop-grid tab-pane fade show active" id="nav-list" role="tabpanel">
                                    @foreach ($reviews as $review)
                                        <div class="list__view__wrapper">
                                            <div class="list__view mt--40">
                                                <div class="thumb">
                                                    <a class="first__img" href="{{ route('reviews.book', $review->book->id) }}">
                                                        <img src="{{ asset('images/book1.jpg') }}" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h2>
                                                        <a href="{{ route('reviews.book', $review->book->id) }}">
                                                            {{ $review->book->name }}
                                                        </a>
                                                    </h2>
                                                    <ul class="prize__box">
                                                        <li>
                                                            <a href="{{ route('reviews.book', $review->book->id) }}" class="text-info">
                                                                {{ $review->total }} {{ trans('messages.review') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('reviews.add', $review->book->id) }}" class="btn-link ml-2 text-info">
                                                                <span class="badge badge-primary">
                                                                    {{ trans('messages.add_review') }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <p>{{ $review->book->title }}</p>
                                                    <ul class="cart__action d-flex">
                                                        <li>
                                                            <span class="text-danger">
                                                                {{ trans('messages.author') }}: {{ $review->book->author }}
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="text-danger">
                                                                {{ trans('messages.publish_date') }}: {{ $review->book->publish_date }}
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="text-danger">
                                                                {{ trans('messages.category') }}: {{ $review->book->category->name }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-5">
                                {!! $reviews->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
