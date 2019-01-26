@extends('layouts.default')

@section('content')
        <div class="page-inner">
            <div class="page-title">
                <h3 class="breadcrumb-header">
                    Organization &nbsp;
                    <div class="btn-group">
                    
                    </div>
                    <form class="form-inline" style="display: inline-block;float: right;">
                        <div class="form-group">
                            <label class="sr-only" for="">Filter</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="dtSearch" placeholder="Search...">
                            </div>
                        </div>
                        <a href="{{ route('organization.create') }}" class="btn btn-danger"><i class="fa fa-plus-circle"></i> Add new</a>
                    </form>
                </h3>
            </div>
            <div id="main-wrapper">
                @if(Session::has('flash_message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    {{ Session::get('flash_message') }}
                            </div>
                        </div>
                    </div>
                @endif
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th style="width: 15%;">Created At</th>
                                            <th style="width: 10%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><a href="{{ route('organization.edit', $value->id) }}" class="text-primary">{{ $value->name }}</a></td>
                                                <td>{{ ucfirst($value->phone) }}</td>
                                                <td>{{ ucfirst($value->email) }}</td>
                                                <td>{{ ucfirst($value->website) }}</td>
                                                <td>{{ date('d M Y h:i:s', strtotime($value->created_at)) }}</td>
                                                <td class="text-center" style="font-size: 18px;">
                                                    <a href="{{ route('organization.show', $value->id) }}" class="text-info"><i class="glyphicon glyphicon-th-list"></i></a>&nbsp;
                                                    <a href="{{ route('organization.edit', $value->id) }}" class="text-info"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                                    <a class="text-danger delete"  data-toggle="confirmation" data-title="Are You Sure to delete this data?" data-btn-ok-label="Yes" data-btn-ok-icon="glyphicon glyphicon-share-alt" data-btn-ok-class="btn-success" data-btn-cancel-label="No!" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-btn-cancel-class="btn-danger" href="{{ route('organization.destroy', $value->id) }}" onclick="event.preventDefault(); $('.delete-form{{ $key }}').submit();"><i class="fa fa-trash"></i></a>
                                                    <form class="delete-form{{ $key }}" action="{{ route('organization.destroy', $value->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">

                                                        <input type="hidden" name="id" value="{{ $value->id }}">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>  
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
    
    <script src="{{ asset('assets/js/bootstrap-confirmation.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var oTable = $('#example').dataTable({
                'sDom': '<"toolbar">rtip'
            });
            $('#dtSearch').keyup(function(){
                oTable.fnFilter($(this).val());
            })

            $('.menu-side').removeClass('active-page')
            $('#Organization').addClass('active-page')
        })
    </script>
@stop