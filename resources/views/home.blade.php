@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User list</div>

                <div class="card-body">
                    @if (isset($clients))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">CREATED AT</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr class="table-tr" style="cursor: pointer" id="{{$client->id}}">
                                    <th scope="row">{{$client->id}}</th>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->created_at}}</td>
                                </tr>
                            @endforeach
                            <tr><td colspan="3">{{ $clients->links() }}</td></tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
