<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Bootstrap Admin Dashboard Task List</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	<div class="container-fluid page-wrapper">
		<div class="row">
			<main class="col-md-12">
				<div class="dropdown link-select" data-auto-send = "true" data-send-to = "sample-send.php">
					<a class="dropdown-toggle selected-text" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Dropdown
					</a>
					<input type="hidden" name="link-select" />
					<ul class="dropdown-menu link-selections" aria-labelledby="dropdownMenu1">
						<li><a href="#" class="link-value" data-value="Action">Action</a></li>
						<li><a href="#" class="link-value" data-value="Another action">Another action</a></li>
						<li><a href="#" class="link-value" data-value="Something else here">Something else here</a></li>
						<li><a href="#" class="link-value" data-value="Separated link">Separated link</a></li>
					</ul>
				</div>
				<div class="dropdown link-select">
					<a class="dropdown-toggle selected-text" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Dropdown
					</a>
					<input type="hidden" name="link-select" />
					<ul class="dropdown-menu link-selections" aria-labelledby="dropdownMenu1">
						<li><a href="#" class="link-value" data-value="Action">Action</a></li>
						<li><a href="#" class="link-value" data-value="Another action">Another action</a></li>
						<li><a href="#" class="link-value" data-value="Something else here">Something else here</a></li>
						<li><a href="#" class="link-value" data-value="Separated link">Separated link</a></li>
					</ul>
				</div>
			</main>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
		jQuery(function($){
			$(".link-select input[type=hidden]").bind("change",function(){
				var
					_parentSelect = $(this).closest('.link-select'),
					_valueName = this.name,
					_selectValue = this.value
				;
				if(typeof _parentSelect.data('auto-send') != 'undefined'){
					$.post(
						_parentSelect.data('send-to'),
						{_valueName:_selectValue},
						function(serverResponse){
							console.log(serverResponse);
						}
					);
				}
			});
			$(".link-select .link-value").click(function(e){
				var
					_linkElement = $(this),
					_selectValue = _linkElement.data('value'),
					_displayText = _linkElement.closest(".link-select").find('.selected-text')
				;
				_linkElement.closest('.link-selections').siblings('input[type=hidden]').val(_selectValue).trigger('change');
				_displayText.html(_linkElement.html());
			});
			
		});
	</script>
</body>
</html>