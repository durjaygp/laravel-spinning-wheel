@extends('backEnd.master')
@section('title', 'Create Game Case')
@section('content')
    <div class="container-fluid">
        <div class="overflow-hidden shadow-none card bg-light-info position-relative">
            <div class="px-4 py-3 card-body">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="mb-8 fw-semibold">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted "
                                        href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Game Case</li>
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
                            <h2>Add Game Case</h2>
                        </div>
                        <div class="mt-3 col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-md-0">
                            <a href="{{ route('game-case.index') }}" class="btn btn-info d-flex align-items-center">
                                <i class="text-white ti ti-list-details me-1 fs-5"></i> Game Case List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('game-case.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <label for="blog_title" class="form-label fw-semibold">Title</label>
                                    <input type="text" name="title" class="form-control" id="blog_title"
                                        placeholder="Game Case Title" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="" class="form-label fw-semibold">Case Category</label>
                                    <select name="skin_id" class="form-select" required>
                                        <option value=""> Case Category</option>
                                        @foreach($skins as $row)
                                            <option value="{{$row->id}}"> {{$row->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">Description</label>
                                    <textarea name="description" id="description" class="form-control" placeholder="Short description" required></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="Image" class="form-label fw-semibold">Image</label>
                                    <input type="file" id="Image" name="image" class="form-control dropify"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="Image" class="form-label fw-semibold">Win Chances</label>
                                    <input type="number" name="win_chance" class="form-control" required step="any" placeholder="0.001">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="" class="form-label fw-semibold">Status</label>
                                    <select name="status" class="form-select">
                                        <option value=""> select status</option>
                                        <option value="1"> Active</option>
                                        <option value="2"> Inactive</option>
                                    </select>
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

@endsection
@section('script')
    <script src="{{ asset('/') }}dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('back') }}/assets/libs/summernote/dist/summernote-lite.min.js"></script>
    <script>
        $("#summernote").summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false,
            // placeholder: Test,// set focus to editable area after initializing summernote
        });
        $("#summernote1").summernote({
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
@endsection
