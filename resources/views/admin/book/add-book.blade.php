@extends('admin.layouts.master')

@section('title', trans('messages.add_book'))

@section('title-header', trans('messages.add_book'))

@section('content')
    <div class="container-fluid">
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ trans('messages.book_name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="{{ trans('messages.book_name') }}">
                                @if ($errors)
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.author') }} <span class="text-danger">*</span></label>
                                <input type="text" name="author" class="form-control" placeholder="{{ trans('messages.author') }}">
                                @if ($errors)
                                    <span class="text-danger">{{ $errors->first('author') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('messages.publish_date') }} <span class="text-danger">*</span></label>
                                        <input type="date" name="publish_date" class="form-control">
                                        @if ($errors)
                                            <span class="text-danger">{{ $errors->first('publish_date') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ trans('messages.category') }} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id">
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
                                <input type="file" name="image" class="form-control">
                                @if ($errors)
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ trans('messages.title_book') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="title" rows="5" placeholder="{{ trans('messages.title_book') }}"></textarea>
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
