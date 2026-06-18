@extends('backend.master');
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Data</p>
                        <h1 class="h3 mb-1">Tables</h1>
                        <p class="text-muted mb-0">
                            Use responsive, searchable tables for
                            operational records.
                        </p>
                    </div>
                </div>
            </div>

            <section class="panel">
                @session('succes')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                <div class="d-flex justify-content-end">
                    <a class="btn btn-danger" href="{{ route('student.create') }}">New Student</a>





                </div>
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title">
                            <i class="bi bi-table" aria-hidden="true"></i><span>Advanced Table</span>
                        </h2>
                        <p class="text-muted mb-0">
                            Searchable responsive table for orders
                            and customer data.
                        </p>
                    </div>
                    <input class="form-control form-control-sm table-search" type="search" placeholder="Search orders"
                        data-table-search="ordersTable" aria-label="Search orders" />
                </div>


                <div class="table-responsive">
                    <table class="table align-middle mb-0" id="ordersTable" data-searchable-table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">Id</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>District</th>
                                <th>Subjects</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $student)
                                <tr>
                                    <td style="width: 50px;" class="fw-semibold">
                                        {{ $student->id }}
                                    </td>
                                    <td>
                                        <div class="table-media">
                                            <img class="product-thumb" src="../assets/images/ecommerce/product-1.jpg"
                                                alt="Wireless Headset" /><span>{{ $student->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $student->gender }}</td>
                                    <td>
                                        <span class="badge text-bg-success">{{ $student->email }}</span>
                                    </td>
                                    <td>{{ $student->phone }}</td>

                                    <td>{{ $student->district }}</td>
                                    <td class="">
                                        {{ $student->subjects }}
                                    </td>


                                    <td class="d-flex">

                                        <button class="btn btn-info btn-sm" type="submit">
                                            <a href="{{ route('student.edit', $student->id) }}"><i
                                                    class="bi bi-eye"></i>Edit</a>

                                        </button>
                                        <button class="btn btn-success text-white"><a class="text-white" href="{{ route('student.show', $student->id) }}">Show</a></button>


                                        <form action="{{ route('student.destroy', $student->id) }}" method="post">
                                            @csrf


                                            <button onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-sm"
                                                type="submit">
                                                <i class="bi bi-trash"></i>

                                            </button>
                                        </form>



                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
@endsection
