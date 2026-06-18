@extends('backend.master')
@section('content')
<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">

        @session('succes')
        <div class="alert alert-success">{{ $value }}</div>
        @endsession

        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-danger" href="{{ route('district.create') }}">New District</a>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>District Name</th>
                <th>Action</th>
            </tr>
            @foreach($districts as $district)
            <tr>
                <td>{{ $district->id }}</td>
                <td>{{ $district->district_name }}</td>
                <td>
                    <a href="{{ route('district.edit', $district->id) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('district.destroy', $district->id) }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this district?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</main>
@endsection