<!DOCTYPE html>
<html>
<head>
	<title>Query</title>
	
</head>
<body>
	<div style="width:500px;">
		<table cellspacing="0" border="1" width="100%">
			<tr>
				<td>ID</td>
				<td>NAME</td>
				<td>VALUE</td>
			</tr>
				<?php foreach($rezult as $val) : ?>
					<tr>
						<td><?=$val['id'];?></td>
						<td><?=$val['name'];?></td>
						<td><?=$val['val'];?></td>
					</tr>
				<?php endforeach;?>
		</table>
	</div>
</body>

</html>

