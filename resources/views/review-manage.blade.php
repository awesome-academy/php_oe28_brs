@extends('layouts.app')

@section('title', trans('messages.review'))

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h3 class="text-center">{{ trans('messages.review_manage') }}</h3>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{ trans('messages.no') }}</th>
                        <th>{{ trans('messages.book_name') }}</th>
                        <th>{{ trans('messages.author') }}</th>
                        <th>{{ trans('messages.publish_date') }}</th>
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
                            <td>{{ $review->book->author }}</td>
                            <td>{{ $review->book->publish_date }}</td>
                            <td>{{ $review->created_at }}</td>
                            <td>
                                @if ($review->status == \App\Enums\StatusReview::StatusInactive)
                                    <span class="badge badge-danger">{{ trans('messages.status_inactive') }}</span>
                                @elseif ($review->status == \App\Enums\StatusReview::StatusActive)
                                    <span class="badge badge-primary">{{ trans('messages.status_active') }}</span>
                                @endif
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{ trans('messages.no') }}</th>
                        <th>{{ trans('messages.book_name') }}</th>
                        <th>{{ trans('messages.author') }}</th>
                        <th>{{ trans('messages.publish_date') }}</th>
                        <th>{{ trans('messages.created_at') }}</th>
                        <th>{{ trans('messages.status') }}</th>
                        <th>{{ trans('messages.action') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
