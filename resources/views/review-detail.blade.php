@extends('layouts.app')

@section('title', trans('messages.review_detail'))

@section('content')
    <div class="page-blog-details section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        <article class="blog-post-details">
                            <div class="post-thumbnail">
                                <img src="{{ asset('images/book.jpg') }}" alt="blog images">
                            </div>
                            <div class="post_wrapper">
                                <div class="post_header">
                                    <h2>{{ $review->book->name }}</h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li>{{ trans('messages.publish_date') }}: {{ $review->book->publish_date }}</li>
                                            <li><a href="#" rel="author">{{ $review->book->author }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <p>{{ $review->content }}</p>
                                </div>
                                <ul class="blog_meta">
                                    <li><a href="#">{{--1 comments--}}</a></li>
                                </ul>
                            </div>
                        </article>
                        <div class="comments_area">
                            <ul class="comment__list">
                                <li>
                                    <div class="wn__comment">
                                        <div class="thumb">
                                            <img src="{{ asset('images/user.jpg') }}" alt="comment images">
                                        </div>
                                        <div class="content">
                                            <div class="comnt__author d-block d-sm-flex">
                                                <span>{{--<a href="#">admin</a> comment--}}</span>
                                                <span>{{--Created_at: 20/11/2019--}}</span>
                                            </div>
                                            <p>{{--Sed interdum at justo in efficitur. Vivamus gravida volutpat sodales.
                                                Fusce ornare sit--}}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="comment_respond">
                            <form class="comment__form" action="#">
                                <p>{{--Dang nhap de comment --}}</p>
                                <div class="input__box">
                                    <textarea name="comment" placeholder="Your comment here"></textarea>
                                </div>
                                <div class="submite__btn">
                                    <a href="#">{{--Post Comment--}}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    <div class="wn__sidebar">
                        <aside class="wedget__categories poroduct--tag">
                            <h3 class="wedget__title">{{--Category--}}</h3>
                            <ul>
                                <li><a href="#">{{--Book name--}}</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
