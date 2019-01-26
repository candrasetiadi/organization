@extends('layouts.default')

@section('content')
    <div class="page-inner">
        <div class="page-title">
            <h3 class="breadcrumb-header">Dashboard</h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            Hello, welcome back {{ Auth::user()->name }}.
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
@endsection

@section('script-extra')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.menu-side').removeClass('active-page')
            $('#dashboard').addClass('active-page')
        })
    </script>
@stop
