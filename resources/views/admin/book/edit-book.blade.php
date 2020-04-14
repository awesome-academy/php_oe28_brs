@extends('admin.layouts.master')

@section('title', trans('messages.edit_book'))

@section('title-header', trans('messages.edit_book'))

@section('content')
    <div class="container-fluid">
        <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ trans('messages.book_name') }} <span class="text-danger">*</span></label>
                                @if ($errors)
                                    <input type="text" value="{{ $book->name }}" name="name" class="form-control" placeholder="{{ trans('messages.book_name') }}">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.author') }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $book->author }}" name="author" class="form-control" placeholder="{{ trans('messages.author') }}">
                                @if ($errors)
                                    <span class="text-danger">{{ $errors->first('author') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('messages.publish_date') }} <span class="text-danger">*</span></label>
                                        <input type="date" value="{{ $book->publish_date }}" name="publish_date" class="form-control">
                                        @if ($errors)
                                            <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('messages.category') }} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id">
                                            <option value="{{ $book->category->id }}">{{ $book->category->name }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors)
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ trans('messages.image') }} <span class="text-danger">*</span></label>
                                <input type="file" value="{{ $book->image }}" name="image" class="form-control">
                                @if ($errors)
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.title_book') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="title" rows="5" placeholder="{{ trans('messages.title_book') }}">{{ $book->title }}</textarea>
                                @if ($errors)
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm">{{ trans('messages.submit') }}</button>
                    <a href="{{ route('book.list-book') }}" class="btn btn-danger btn-sm">{{ trans('messages.cancel') }}</a>
                </div>
            </div>
        </form>
    </div>
@endsection
