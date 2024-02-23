@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
                <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Notice Board</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" required placeholder="Title">
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea id="compose-textarea" class="form-control" style="height: 300px">
                                        </textarea>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script type="text/javascript">
    $(function () {
        $('#compose-textarea').summernote()
    });

    </script>
@endsection
