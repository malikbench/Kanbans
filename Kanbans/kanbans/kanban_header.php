

<!doctype html>
<html lang="en">
	<head>
	  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <link rel="stylesheet" type="text/css" href="kanban_style.css">
	  
	  <script>
	  $(function() {
			$( ".sortable" ).sortable({
			  connectWith: ".connectedSortable",
			  
			});
			
			$('.add-button').click(function() {
				var newCellText = $('#new_text').val();
				$(this).closest('div.container').find('ul').append('<li class="card">'+newCellText+'</li>');
			});    
		
			$('.save-button').click(function(){
				
			})
		});
	  </script>      
	</head>
	<body>

		<div class="container" style="background-color:red;">
			<h2>Stories</h2>
				<ul class="sortable connectedSortable">
				  
				</ul>
			<div class="link-div">
				<input type="text" id="new_text" value=""/>
				<input type="button" name="btnAddNew" value="Add" class="add-button"/>
			
				
			</div>
		</div>
