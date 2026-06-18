@extends('backend.master')
@section('content')
<main class="dashboard-content">
    <div class="container-fluid px-3 px-lg-4 py-4">
        <h3>Edit District</h3>

        <form action="{{ route('district.update', $district->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>District Name</label>
                <input type="text" name="district_name" class="form-control"
                    value="{{ $district->district_name }}">
                @error('district_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('district.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</main>
@endsection