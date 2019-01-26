<!DOCTYPE html>
<html lang="en">
	@include('layouts.header')

	@yield('content')

	@include('layouts.scripts')
	@yield('script-extra')
</html>