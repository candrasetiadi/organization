<script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
<script src="{{ asset('assets/plugins/parsley/parsley.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
<script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('assets/js/space.min.js') }}"></script>

<script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/plugins/nvd3/nv.d3.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<!-- <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/chart.js') }}"></script>
 -->
<script src="{{ asset('assets/plugins/datatables/js/jquery.datatables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap-confirmation.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/tus.js') }}"></script>

<script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
    
    $('[data-toggle=confirmation]').confirmation({
	  rootSelector: '[data-toggle=confirmation]',
    // other options
	});
</script>