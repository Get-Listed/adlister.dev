<?php

require_once "../bootstrap.php";

$showAds = Ad::all();


?>

	<div id = "adDisplay">
		<table>
			<thead>
				<th>Item</th>
				<th>Price</th>
				<th>Date</th>
				<th>Location</th>
				<th>Category</th>
				<th>Duration</th>
				<th>Image</th>
				<th>Contact Info</th>
				<th>Description</th>
			</thead>
			<tbody>
				<? foreach($showAds as $ad): ?>
				<tr>
				<td> <?= $ad['item']; ?></td>
				<td> <?= $ad['price']; ?></td>
				<td> <?= $ad['date']; ?></td>
				<td> <?= $ad['location']; ?></td>
				<td> <?= $ad['category']; ?></td>
				<td> <?= $ad['duration']; ?> </td>
				<td> <?= $ad['image']; ?></td>
				<td> <?= $ad['contactInfo']; ?></td>
				<td> <?= $ad['description']; ?></td>
				</tr>
				<?endforeach; ?>
			</tbody>
		</table>
	</div>