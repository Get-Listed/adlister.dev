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
				<td> <?= htmlspecialchars(strip_tags($ad['item'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['price'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['date'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['location'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['category'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['duration'])); ?> </td>
				<td> <?= htmlspecialchars(strip_tags($ad['image'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['contactInfo'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['description'])); ?></td>
				</tr>
				<?endforeach; ?>
			</tbody>
		</table>
	</div>