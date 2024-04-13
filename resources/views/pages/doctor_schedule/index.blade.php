@extends('layouts.app')

@section('title', 'Doctor Schedule')


@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Doctor</h1>
                <div class="section-header-button">
                    <a href="{{ route('doctor-schedules.create') }}" class="btn btn-primary">Add New Schedule</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Doctor Schedule</a></div>
                    <div class="breadcrumb-item">All Doctor Schedule</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Doctor Schedu;e</h2>
                <p class="section-lead">
                    You can manage all Doctor Schedule, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Schedule Doctor</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('doctor-schedules.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-bordered table-md table">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th>Day</th>
                                                <th>
                                                    Time
                                                </th>
                                                <th>Note</th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctorSchedules as $schedule)
                                                <tr>
                                                    <td>
                                                        {{$schedule->doctor->doctor_name}}
                                                    </td>
                                                    <td>
                                                        {{ $schedule->day }}
                                                    </td>
                                                    <td>
                                                        {{ $schedule->time }}
                                                    </td>
                                                    <td>
                                                        {{ $schedule->note }}
                                                    </td>
                                                    <td>{{ $schedule->status }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href='{{ route('doctor-schedules.edit', $schedule->id) }}'
                                                                class="btn btn-sm btn-info btn-icon">
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>

                                                            <form action="{{ route('doctor-schedules.destroy', $schedule->id) }}"
                                                                method="POST" class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE" />
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />
                                                                <button
                                                                    class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $doctorSchedules->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
