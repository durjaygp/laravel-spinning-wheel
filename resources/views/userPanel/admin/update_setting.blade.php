@extends('userPanel.master')
@section('title','Update Website Setting')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="{{route('admin.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Website</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{asset('back')}}/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
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

                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('update.setting')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Website Name/Title</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Website Name" value="{{$row->name}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter address" value="{{$row->address}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$row->email}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Phone</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" value="{{$row->phone}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Website Footer Text</label>
                                    <input type="text" name="footer" class="form-control" placeholder="All Rights Reserved Powered by websiteowner" value="{{$row->footer}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Website Author Name<small class="text-sm text-gray-400">(Optional)</small></label>
                                    <input type="text" name="author" class="form-control" placeholder="Website Author Name" value="{{$row->author}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Website URL</label>
                                    <input type="text" name="url" class="form-control" placeholder="Website URL" value="{{$row->url}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Website Keywords</label>
                                    <input type="text" name="keywords" class="form-control" placeholder="Website Keywords" value="{{$row->keywords}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Website Tags</label>
                                    <input type="text" name="tags" class="form-control" placeholder="Website Tags" value="{{$row->tags}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="exampleInputPassword1" class="form-label fw-semibold">Website Description <small>(It also appear in Homepage)</small></label>
                                <textarea name="description" id="" cols="10" rows="5" class="form-control" placeholder="Write a short Description">{{$row->description}}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Google Verification Code <small class="text-sm text-gray-400">(Optional)</small></label>
                                    <input type="text" name="google" class="form-control" placeholder="Enter Category Title" value="{{$row->google}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Website Image, LOGO <small>(Width 355px X Height 100px)</small></label>
                                        <input class="dropify" type="file" name="website_logo" accept="image/*">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Existing LOGO</label> <br>
                                        <img src="{{asset($row->website_logo)}}" class="img-fluid"  width="80px" height="80px">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Website FavIcon <small> (Width 80px X Height 80px)</small></label>
                                        <input class="dropify" type="file" name="fav_icon" accept="image/*">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Existing FavIcon</label> <br>
                                        <img src="{{asset($row->fav_icon)}}" alt="" width="80px" height="80px">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('/')}}dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.css">

    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/quill/dist/quill.snow.css">
@endsection
@section('script')

    <script src="{{asset('/')}}dropify/dist/js/dropify.min.js"></script>
    <script src="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.js"></script>
    <script src="{{asset('back')}}/assets/libs/quill/dist/quill.min.js"></script>
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
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });
    </script>
    <script>
        var quill = new Quill("#editor", {
            theme: "snow",
        });
    </script>
@endsection
