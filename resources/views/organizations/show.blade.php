@extends('layouts.default')

@section('content')
    <div class="page-inner">
        <div class="page-title">
            <h3 class="breadcrumb-header">
            <div class="btn-group">
                <a href="{{ route('organization.index') }}" class="btn btn-default"><i class="fa fa-angle-left"></i></a>
            </div>&nbsp;
            Organization Detail</h3>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th style="width: 15%;">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ url('/images/avatar/{$value->avatar}') }}" alt=""></td>
                                            <td><a href="{{ route('organization.edit', $value->id) }}" class="text-primary">{{ $value->name }}</a></td>
                                            <td>{{ ucfirst($value->phone) }}</td>
                                            <td>{{ ucfirst($value->email) }}</td>
                                            <td>{{ date('d M Y h:i:s', strtotime($value->created_at)) }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-extra')
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
@endsection