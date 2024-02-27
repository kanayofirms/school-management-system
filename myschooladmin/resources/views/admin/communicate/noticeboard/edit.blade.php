@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
                <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Notice Board</h1>
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
                                        <input type="text" class="form-control"  value="{{ $getRecord->title }}" name="title" required placeholder="Title">
                                    </div>

                                    <div class="form-group">
                                        <label>Notice Date</label>
                                        <input type="date" class="form-control"  value="{{ $getRecord->notice_date }}" name="notice_date" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Publish On</label>
                                        <input type="date" class="form-control" value="{{ $getRecord->publish_on }}" name="publish_on" required>
                                    </div>

                                    @php
                                        $message_to_student = $getRecord->getMessageToSingle($getRecord->id, 3);
                                    @endphp
                                    <div class="form-group">
                                        <label style="display: block;">Message To</label>
                                        <label style="margin-right: 40px;"><input type="checkbox" value="3" name="message_to[]">Student</label>
                                        <label style="margin-right: 40px;"><input type="checkbox" value="4" name="message_to[]">Parent</label>
                                        <label><input type="checkbox" value="2" name="message_to[]">Teacher</label>
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">
                                            value="{{ $getRecord->message }}"</textarea>
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
        $('#compose-textarea').summernote({
            height: 200,
        });
    });

    </script>
@endsection
