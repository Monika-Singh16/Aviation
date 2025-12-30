@extends('layout.master')

@section('title', 'Thank You')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="col-lg-7 col-md-9 text-center">

            <div class="card border-0 shadow-lg rounded-4 p-5">

                <!-- Success Icon -->
                <div class="mb-4">
                    <i class="las la-check-circle text-success"
                        style="font-size: 90px;"></i>
                </div>

                <!-- Heading -->
                <h1 class="fw-bold mb-3">Thank You!</h1>

                <!-- Message -->
                <p class="text-muted fs-5 mb-4">
                    Your message has been received successfully.
                    <br>
                    Our team will get back to you as soon as possible.
                </p>

                <!-- Divider -->
                <hr class="my-4">

                <!-- Extra Info -->
                <p class="text-muted mb-4">
                    We appreciate your interest and trust in us.
                </p>

                <!-- Buttons -->
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ url('/') }}" class="btn btn-primary px-4 py-2">
                        Back to Home
                    </a>

                    {{-- <a href="{{ url('/courses') }}" class="btn btn-outline-secondary px-4 py-2">
                        View Courses
                    </a> --}}
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
