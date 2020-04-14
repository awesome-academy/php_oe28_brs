@extends('admin.layouts.master')

@section('title', trans('messages.list_book'))

@section('title-header', trans('messages.book_management'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('messages.list_book') }}</h3>
                    <a href="{{ route('books.create') }}" class="btn btn-success btn-sm float-right">{{ trans('messages.add_book') }}</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ trans('messages.no') }}</th>
                            <th>{{ trans('messages.book_name') }}</th>
                            <th>{{ trans('messages.category') }}</th>
                            <th>{{ trans('messages.author') }}</th>
                            <th>{{ trans('messages.creator') }}</th>
                            <th>{{ trans('messages.created_at') }}</th>
                            <th>{{ trans('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($books as $key => $book)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->creator->full_name }}</td>
                                <td>{{ $book->created_at }}</td>
                                <td>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm float-left btn-remove">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm ml-1"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ trans('messages.no') }}</th>
                            <th>{{ trans('messages.book_name') }}</th>
                            <th>{{ trans('messages.category') }}</th>
                            <th>{{ trans('messages.author') }}</th>
                            <th>{{ trans('messages.creator') }}</th>
                            <th>{{ trans('messages.created_at') }}</th>
                            <th>{{ trans('messages.action') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
