<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	@include('layouts.partials._css')
</head>
<body>
	@include("layouts.partials._header")
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2">
				@include('layouts.partials._sidebar')
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<div id="content">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	@include("layouts.partials._js")
</body>
</html>