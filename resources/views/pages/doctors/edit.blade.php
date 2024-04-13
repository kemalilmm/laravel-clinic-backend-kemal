@extends('layouts.app')

@section('title', 'Edit Doctor')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')


    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Doctor : {{ $doctor->doctor_name }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Doctors</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctors</h2>

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="card">
                    <form enctype="multipart/form-data" action="{{ route('doctor.update', $doctor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Doctor's Name</label>
                                <input type="text"
                                    class="form-control @error('doctor_name')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_name }}" name="doctor_name">
                                @error('doctor_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Doctor's Email</label>
                                <input type="email"
                                    class="form-control @error('doctor_email')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_email }}" name="doctor_email">
                                @error('doctor_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- SIP --}}
                            <div class="form-group">
                                <label>SIP</label>
                                <input type="sip"
                                    class="form-control @error('sip')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->sip }}" name="sip">
                                @error('sip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Specialist</label>
                                <input type="doctor_specialist"
                                    class="form-control @error('doctor_specialist')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_specialist }}" name="doctor_specialist">
                                @error('doctor_specialist')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputGroupFile01">Doctor Photo</label>
                                <div class="custom-file">
                                    <input type="file" name="photo" class="custom-file-input" id="customFile" value="{{$doctor->photo}}">
                                    <label class="custom-file-label" for="customFile">
                                        @if ($doctor->photo)
                                            {{$doctor->photo}}
                                        @else
                                            Choose File
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $('#customFile').on('change', function() {
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
    </script>
@endpush
