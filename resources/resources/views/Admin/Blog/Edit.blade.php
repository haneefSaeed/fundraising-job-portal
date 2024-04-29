@extends('layouts.admin')


@section('header')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

@endsection

@section("content")


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog Settings /</span> Blog / Edit</h4>

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Editing: <strong>{{$blog->title}}</strong></h5>
                                <small class="text-muted float-end">Default label</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"  action="{{ route('blog.update',['blog' => $blog]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Blog Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="blog_title" value="{{$blog->title}}" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Content</label>
                                        <div class="col-sm-10">
                                            <textarea
                                                    class="form-control"
                                                    id="summernote"
                                                    name="content"
                                                    required
                                            >{{$blog->content}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-email">Image</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input
                                                        type="file"
                                                        id="imageURL"
                                                        class="form-control"
                                                        name="img"
                                                        value="{{$blog->img}}"
                                                />
                                                {{--                                                <span class="input-group-text" id="basic-default-email2">Upload .jpg or .png only</span>--}}
                                            </div>
                                            <div class="form-text">Upload Proper size image and .jpg or .png format</div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" id="Status" class="form-control" required>
                                                <option value="0">unpublish</option>
                                                <option value="1">Publish</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Category</label>
                                        <div class="col-sm-10">
                                            <select name="cat_id" id="cat_id" class="form-control" required>
                                                @foreach($blog_cat as $cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Blog Tags</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tags" class="form-control" id="tags" value="{{$blog->tags}}" />
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{date("Y/m/d H:i:s")}}" name="updated_at" id="updated_at">

                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

@endsection

@section('footer')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        document.getElementById('db_pitem_blogs').classList.add('active');
        document.getElementById('db_item_blog').classList.add('active');
    </script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
