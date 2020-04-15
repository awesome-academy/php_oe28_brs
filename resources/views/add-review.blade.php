@extends('layouts.app')

@section('title', trans('messages.add_review'))

@section('content')
    <div class="page-blog-details section-padding--lg bg--white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="blog-details content">
                        <div class="comment_respond">
                            <form class="comment__form" action="{{ route('reviews.save', $book->id) }}" method="post">
                                @csrf
                                <h3>{{ trans('messages.write_review') }}: {{ $book->name }}</h3>
                                @if ($errors)
                                    <span class="text-danger">{{ $errors->first('review') }}</span>
                                @endif
                                <div class="input__box">
                                    <textarea name="review" rows="15" placeholder="{{ trans('messages.you_review') }}"></textarea>
                                </div>
                                <div class="submite__btn text-center">
                                    <button type="submit" class="btn btn-success">{{ trans('messages.add_review') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
