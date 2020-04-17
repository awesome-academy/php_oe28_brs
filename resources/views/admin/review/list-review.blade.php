@extends('admin.layouts.master')

@section('title', trans('messages.list_review'))

@section('title-header', trans('messages.review_manage'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('messages.list_review') }}</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ trans('messages.no') }}</th>
                            <th>{{ trans('messages.book_name') }}</th>
                            <th>{{ trans('messages.category') }}</th>
                            <th>{{ trans('messages.creator') }}</th>
                            <th>{{ trans('messages.created_at') }}</th>
                            <th>{{ trans('messages.status') }}</th>
                            <th>{{ trans('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reviews as $key => $review)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $review->book->name }}</td>
                                <td>{{ $review->book->category->name }}</td>
                                <td>{{ $review->user->full_name }}</td>
                                <td>{{ $review->created_at }}</td>
                                <td>
                                    @if ($review->status == \App\Enums\StatusReview::StatusInactive)
                                        <span class="badge badge-danger">{{ trans('messages.status_inactive') }}</span>
                                    @elseif ($review->status == \App\Enums\StatusReview::StatusActive)
                                        <span class="badge badge-primary">{{ trans('messages.status_active') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('reviews.approved', $review->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm float-left">{{ trans('messages.approved') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('messages.no') }}</th>
                            <th>{{ trans('messages.book_name') }}</th>
                            <th>{{ trans('messages.review') }}</th>
                            <th>{{ trans('messages.creator') }}</th>
                            <th>{{ trans('messages.created_at') }}</th>
                            <th>{{ trans('messages.status') }}</th>
                            <th>{{ trans('messages.action') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
