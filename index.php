
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>tree</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link href="stylesheet/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheet/my.css" rel="stylesheet">
</head>

<html>
<body>

<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-10">
				<div class="converter-wrap">

					<h1>Дерево каталогов</h1>					

					<form id="form" class="form-inline">

						<br><br>
						<label class="control-label" for="folder_name">Проверить папку:</label>
						
						<input id="folder_name" class="form-control" type="text" name="folder_name" placeholder="название папки" value="my_folder" >
						
						<br><br>
						
						<button type="submit" value="send" class="btn btn-success">Выполнить</button>
						<br><br>

					</form>

					<br><hr><br>
					<div id="comment"></div> 
					<br>					
					<div id="result"></div>
										
				</div>
			</div>
		</div>
	</div>

	<script>

		$("#form").submit(function(e) {

			var folder_name = $("#folder_name").val();			
			console.log(folder_name);
			
			$.ajax({
				type: "POST",
				url: "tree.php",
				data:{folder_name:folder_name
				},
				dataType: 'json',
					error: function(data) {
						$('#result').html('<p class="text-error" style="color:#f5345f">Ошибка чтения!</p>'); 
						$('#comment').html('');
					},
					success: function(data) {
 
						$('#result').html(data.folder_name);
						$('#comment').html(data.comment);				
					}
				});
			e.preventDefault();
		});

	</script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>


