<?php

$dbc->exec('TRUNCATE national_parks');

$query = 'INSERT INTO posts (name, location, date_established, area_in_acres, description)
		VALUES (:name, :location, :date, :size, :description)';




?>