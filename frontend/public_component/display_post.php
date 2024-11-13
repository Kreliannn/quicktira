<?php foreach ($property_data as $property): ?>
	<div class="col-12 col-md-4">
		<form class="container mt-3 " action="user.tenant.listing_view.php" method="post">
			<div class="card shadow">
				<div class="card-header d-flex align-items-center">
					<img src="image/profile_image/<?=$property['profile_picture']?>" alt="Profile" class="rounded-circle me-2" style="width: 40px; height: 40px;">
					<div>
						<h6 class="card-title mb-0"> <?=$property['fullname']?> </h6>
						<small class="text-muted"><?=$property['post_created_at']?></small>
					</div>
				</div>
				<img src="image/post_property_image/<?=$property['post_images']?>" alt="Property" class="card-img-top img-fluid" style="width:100%; height:300px;">
				<div class="card-body">
					<h5 class="card-title"><?=$property['post_title']?></h5>
					<h6 class="mb-2">$<?=$property['post_price']?></h6>
					<div class="d-flex justify-content-between mb-2">
						<small class="text-muted"><?=$property['room_count']?> Rooms • <?=$property['bathroom_count']?> Baths • <?=$property['sqr_meters']?> m²</small>
					</div>
					<p class="card-text small"><i class="bi bi-geo-alt-fill"></i> <?=$property['post_location']?></p>
					<div class="d-flex justify-content-between align-items-center">
						<div class='row gap-2 ' style='width:100px'>
							<?php require('public_component/like_react.php'); ?>
							<?php require('public_component/favorite_react.php'); ?>                                          
						</div>
						<input type='hidden' name='post_id' value='<?=$property['post_id']?>'>
						<input type='submit' class="btn btn-sm text-light" value='View Post' style="background-color: #A5B68D">
					</div>
				</div>
			</div>
		</form>
	</div>
<?php endforeach; ?>