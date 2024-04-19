@extends('backEnd.master')
@section('title', 'Update User Point')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted "
                                        href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">User Point</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('back') }}/assets/images/breadcrumb/ChatBc.png" alt=""
                                class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">
            <!-- --------------------- start Contact ---------------- -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4 ">
                            <h2>@yield('title')</h2>
                        </div>
                        <div class="col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="{{ route('game-case.index') }}" class="btn btn-info d-flex align-items-center">
                                <i class="ti ti-list-details text-white me-1 fs-5"></i> User Point List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('user-point.update', $userPoint->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="" class="form-label fw-semibold">User</label>
                                    <select name="user_id" class="form-select">
                                        <option value=""> select User</option>
                                        @foreach ($users as $user)
                                            <option {{ $userPoint->user_id == $user->id ? 'selected' : '' }}
                                                value="{{ $user->id }}"> {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">Point</label>
                                    <input type="number" value="{{ $userPoint->point }}" class="form-control"
                                        name="point" id="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="gap-3 d-flex align-items-center">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('/') }}dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="{{ asset('back') }}/assets/libs/summernote/dist/summernote-lite.min.css">

    <link rel="stylesheet" href="{{ asset('back') }}/assets/libs/quill/dist/quill.snow.css">
@endsection
@section('script')

    <script src="{{ asset('/') }}dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/summernote/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/quill/dist/quill.min.js"></script>
    <script>
        $("#summernote").summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
        });
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
    <script>
        var quill = new Quill("#editor", {
            theme: "snow",
        });
    </script>
@endsection
