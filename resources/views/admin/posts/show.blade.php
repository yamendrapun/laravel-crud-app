@extends('admin.layouts.app')

@section('title')
    Show Post 
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Post Details: </h2>
        <table class="table table-striped table-bordered table-hover" id="" aria-describedby="sample-table-2_info">
            <thead>
                <tr>
                    <th scope="col">Column Name</th>
                    <th scope="col">Column Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Post Title</td>
                    <td>{{ $data[0]->title }}</td> </td>
                </tr>
                <tr>
                    <td>Post Content</td>
                    <td>{{ $data[0]->content }} </td>
                </tr>
                <tr>
                    <td>Post Content</td>
                    <td>{{ $data[0]->content }} </td>
                </tr>
                <tr>
                    <td>Post Created At</td>
                    <td>{{ date('jS M, Y', strtotime($data[0]->created_at)) }} </td>
                </tr>
                <tr>
                    <td>Post Created By</td>
                    <td>{{ ucfirst($data[0]->firstName) }} {{ ucfirst($data[0]->lastName) }}</td>
                </tr>
            </tbody>
        </table>

        <a href="/posts" class="btn main-color-bg">Go Back</a>
    </div>
@endsection
