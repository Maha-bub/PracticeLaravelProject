@extends('backend.master');


@push('styles')
@endpush

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">Add User</h1>
                        <p class="text-muted mb-0">Create a new user account with District and team assignments.</p>
                    </div>
                </div>
                <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="{{ url('/students') }}"><i
                            class="bi bi-arrow-left" aria-hidden="true"></i> Back to Student List</a></div>
            </div>

            <section class="row g-3">
                <div class="col-12 col-xl-12">
                    <form class="panel needs-validation" action="{{ route('student.store') }}" method="post" novalidate>
                        @csrf
                        <div class="panel-header">
                            <div>
                                <h2 class="h5 mb-1 section-title"><i class="bi bi-person-plus"
                                        aria-hidden="true"></i><span>User Information</span></h2>
                                <p class="text-muted mb-0">Create a user account with validated fields.</p>
                            </div>
                        </div>

                        <div class="row g-3">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <label class="form-label" for="name">Full Name</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    value="{{ old('name') }}" required>
                                <div class="invalid-feedback">Full name is required.</div>
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6">
                                <label class="form-label" for="gender">Gender</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" value="Male" type="radio" name="gender"
                                        id="genderMale" {{ old('gender', 'Male') == 'Male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" value="Female" type="radio" name="gender"
                                        id="genderFemale" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" value="Others" type="radio" name="gender"
                                        id="genderOthers" {{ old('gender') == 'Others' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="genderOthers">Others</label>
                                </div>
                                <div class="invalid-feedback">Gender is required.</div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="email"
                                    value="{{ old('email') }}" required>
                                <div class="invalid-feedback">Enter a valid email.</div>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label" for="phone">Phone</label>
                                <input class="form-control" id="phone" name="phone" type="tel"
                                    value="{{ old('phone') }}" required>
                                <div class="invalid-feedback">Phone number is required.</div>
                            </div>

                            <!-- District -->
                            <div class="col-md-6">
                                <label class="form-label" for="district">District</label>
                                <select class="form-select" id="district" name="district" required>
                                    <option value="">Choose a District</option>
                                    <option value="Dhaka" {{ old('district') == 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                                    <option value="Sylhet" {{ old('district') == 'Sylhet' ? 'selected' : '' }}>Sylhet
                                    </option>
                                    <option value="Rangpur" {{ old('district') == 'Rangpur' ? 'selected' : '' }}>Rangpur
                                    </option>
                                    <option value="Bogura" {{ old('district') == 'Bogura' ? 'selected' : '' }}>Bogura
                                    </option>
                                </select>
                                <div class="invalid-feedback">Choose a District.</div>
                            </div>

                            <!-- Subjects -->
                            <div class="col-md-6">
                                <label class="form-label d-block">Subject</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="JAVASCRIPT"
                                        id="checkJs"
                                        {{ is_array(old('subjects')) && in_array('JAVASCRIPT', old('subjects')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkJs">JAVASCRIPT</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="PHP"
                                        id="checkPhp"
                                        {{ is_array(old('subjects')) && in_array('PHP', old('subjects')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkPhp">PHP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="LARAVEL"
                                        id="checkLaravel"
                                        {{ is_array(old('subjects')) && in_array('LARAVEL', old('subjects')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkLaravel">LARAVEL</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="JAVA"
                                        id="checkJava"
                                        {{ is_array(old('subjects')) && in_array('JAVA', old('subjects')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkJava">JAVA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="subjects[]" value="REACT_JS"
                                        id="checkReact"
                                        {{ is_array(old('subjects')) && in_array('REACT_JS', old('subjects')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkReact">React js</label>
                                </div>
                                <div class="invalid-feedback">Choose Your Subjects</div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                            <a class="btn btn-outline-secondary" href="users.html">Cancel</a>
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-person-check" aria-hidden="true"></i> Create User
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="panel h-100">
                        <h2 class="h5 mb-3 section-title"><i class="bi bi-list-check" aria-hidden="true"></i><span>Access
                                Checklist</span></h2>
                        <div class="activity-list">
                            <div class="activity-item"><span class="activity-dot bg-success"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">Assign District</p>
                                    <p class="text-muted small mb-0">Start with the least privileged District.</p>
                                </div>
                            </div>
                            <div class="activity-item"><span class="activity-dot bg-primary"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">Add team</p>
                                    <p class="text-muted small mb-0">Team ownership controls dashboards.</p>
                                </div>
                            </div>
                            <div class="activity-item"><span class="activity-dot bg-warning"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">Send invite</p>
                                    <p class="text-muted small mb-0">Users receive activation by email.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection()



@push('scripts')
@endpush
