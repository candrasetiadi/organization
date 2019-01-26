@extends('layouts.default')

@section('content')
        <div class="page-inner">
            <div class="page-title">
                <h3 class="breadcrumb-header">
                    <div class="btn-group">
                        <a href="{{ route('person.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i></a>
                    </div>&nbsp;
                    Create New Person</h3>
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
                                <form method="POST" action="{{ route('person.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for="organization_id">Organization</label>
                                        <select class="form-control select" name="organization_id" id="organization_id" data-parsley-required="true">
                                            
                                            @foreach ($organizations as $key => $value)
                                                <option value="{{ $value->id }}">{{ ucfirst($value->name) }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength="200" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" maxlength="200" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" maxlength="15" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="avatars">Avatar</label>
                                        <input type="file" class="form-control inputImg" name="avatars" value="{{ old('avatars') }}" data-id="imgPreview" required>
                                        <img src="" alt="" id="imgPreview" width="150" height="150">
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
            $('#Person').addClass('active-page') 
            
            $(".inputImg").change(function() {
                var thisId = $(this).attr('data-id')
                readURL(this, thisId)
            });
        })
    </script>
@stop