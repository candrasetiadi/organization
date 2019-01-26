@extends('layouts.default')

@section('content')
        <div class="page-inner">
            <div class="page-title">
                <h3 class="breadcrumb-header">
                    <div class="btn-group">
                        <a href="{{ route('organization.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i></a>
                    </div>&nbsp;
                    Edit Organization</h3>
            </div>
            <div id="main-wrapper">
                @if ($errors->any())
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if(Session::has('flash_message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ Session::get('flash_message') }}
                        </div>
                    </div>
                </div> 
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-body">
                                <form method="POST" action="{{ route('organization.update', $data->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $data->name }}" maxlength="200" required>
                                        <input type="hidden" name="_method" value="PUT">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $data->email }}" maxlength="200" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $data->phone }}" maxlength="15" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" name="website" value="{{ $data->website }}" maxlength="200" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="logos">Logo</label>
                                        <input type="file" class="form-control inputImg" name="logos" value="" data-id="imgPreview">
                                        <img src="{{ $url }}" alt="" id="imgPreview" width="150" height="150">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--row-->

            </div><!-- Main Wrapper -->
        </div><!-- /Page Inner -->
    </div><!-- /Page Content -->
</div><!-- /Page Container -->
            
@endsection

@section('script-extra')
    
    <script type="text/javascript">
        function readURL(input, thisId) {

            if (input.files && input.files[0]) {
                var reader = new FileReader()

                reader.onload = function(e) {
                    $('#' + thisId).attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }

        $(document).ready(function(){
            $('.menu-side').removeClass('active-page')
            $('#Organization').addClass('active-page')     
            
            $(".inputImg").change(function() {
                var thisId = $(this).attr('data-id')
                readURL(this, thisId)
            });
        })
    </script>
@stop