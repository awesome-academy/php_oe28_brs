@extends('layouts.app')

@section('title', 'book')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h3 class="text-center">{{--Quan li book--}}</h3>
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>{{--No.--}}</th>
                        <th>{{--Name Book--}}</th>
                        <th>{{--Author--}}</th>
                        <th>{{--Publish--}}</th>
                        <th>{{--Title--}}</th>
                        <th>{{--Category--}}</th>
                        <th>{{--Created_at--}}</th>
                        <th>{{--Action--}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>{{--No.--}}</th>
                        <th>{{--Name Book--}}</th>
                        <th>{{--Author--}}</th>
                        <th>{{--Publish--}}</th>
                        <th>{{--Title--}}</th>
                        <th>{{--Category--}}</th>
                        <th>{{--Created_at--}}</th>
                        <th>{{--Action--}}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
