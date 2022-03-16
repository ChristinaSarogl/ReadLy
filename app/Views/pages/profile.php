<div class="container pb-3" style="background: #ebebeb;">
	<p class="display-6 pt-3 text-center">Profile</p>
	<hr>
	<div class="d-flex flex-column flex-md-row align-items-center mt-3">
		<?php if($profileImage == NULL): ?>
			<img class="rounded-circle p-2" src="<?=base_url('profilePics')?>/default_profile.jpg" width="180px" height="180px">
		<?php else: ?>
			<img class="rounded-circle p-2" src="<?=base_url('profilePics')?>/<?php print_r($profileImage)?>" width="180px" height="180px">
		<?php endif ?>
		<div class="d-flex flex-grow-1">
			<table class="table table-sm mx-3">
				<tbody>
					<tr>
						<th>Username:</th>
						<td><?= esc($username) ?></td>
					</tr>
					<tr>
						<th>Email:</th>
						<td><?= esc($email) ?></td>
					</tr>
					<tr>
						<th>Joined:</th>
						<td><?= esc($joined) ?></td>
					</tr>
					<tr>
						<th>Reviews:</th>
						<td><?= esc($reviewCount) ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="d-flex flex-row flex-md-column">
			<a class="btn btn-outline-secondary m-2" href="<?php echo base_url() ?>/update/<?php echo session()->get('id') ?>"><i class="bi bi-pencil-square"></i> Edit profile</a>
			<a class="btn btn-outline-success m-2" href="<?php echo base_url() ?>/add_book"><i class="bi bi-plus-square"></i> Add book</a>
			<a class="btn btn-outline-danger m-2" href="<?php echo base_url() ?>/logout"><i class="bi bi-box-arrow-right"></i> Disconnect</a>
		</div>            
	</div>      
	
	<div class="d-none d-md-inline">
		<ul class="nav nav-tabs mx-5 mt-4">
			<li class="nav-item">
			  <button class="nav-link active">Want to Read</button>
			</li>
			<li class="nav-item">
				<button class="nav-link link-dark">Reading</button>
			</li>
			<li class="nav-item">
				<button class="nav-link link-dark">Completed</button>
			</li>
			<li class="nav-item">
				<button class="nav-link link-dark" id="prof-reviews-link" onclick="setActive(4,<?php echo session()->get('id') ?>)">My Reviews</button>
			</li>
		</ul>
	</div>
	
	<!-- Mobile -->
	<div class="d-md-none bg-white pe-1 mx-1">
		<div class="row">
			<div class="dropdown text-end my-2">
				<button class="btn btn-outline-dark dropdown-toggle" type="button" id="listMenuButton"
					data-bs-toggle="dropdown" aria-expanded="false"></button>
				<div class="dropdown-menu" aria-labelledby="listMenuButton">
					<a class="dropdown-item active">Want to  Read</a>
					<a class="dropdown-item">Reading</a>
					<a class="dropdown-item">Completed</a>
					<button class="dropdown-item" id="prof-reviews-btn" onclick="setActive(4,<?php echo session()->get('id') ?>)">My Reviews</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row mx-md-5 mx-1 pt-2 bg-white">  
		<div class="accordion accordion-flush" id="ajax-results">
		
		</div>
	</div>
	
</div>

<script>
	function getData(category,id){
		var resultDiv = document.getElementById('ajax-results');
		if(resultDiv != null){
			// Fetch data
			fetch('https://mi-linux.wlv.ac.uk/~1801448/bookhood/public/index.php/ajax/get/' + category + '/' + id)
			.then(response => response.json())
			.then(response => {				
				response.forEach(function(review,index){
					item = document.createElement('div');
					item.setAttribute('class','accordion-item');
					
					header = document.createElement('h2');
					header.setAttribute('class','accordion-header');
					header.setAttribute('id','header-' + review.book_slug);
					
					headerBtn = document.createElement('button');
					headerBtn.setAttribute('class','accordion-button collapsed');
					headerBtn.setAttribute('type','button');
					headerBtn.setAttribute('data-bs-toggle','collapse');
					headerBtn.setAttribute('data-bs-target','#info-' + review.book_slug);
					headerBtn.setAttribute('aria-expanded','false');
					headerBtn.setAttribute('aria-controls','info-' + review.book_slug);
					
					btnTitleDiv = document.createElement('div');
					btnTitleDiv.setAttribute('class','d-flex justify-content-between w-100 me-3');
					
					title = document.createElement('p');
					title.setAttribute('class','m-0');
					title.innerHTML = review.book_title;
					
					date = document.createElement('p');
					date.setAttribute('class','m-0 text-small text-secondary');
					date.innerHTML = review.created_at;
					
					infoDiv = document.createElement('div');
					infoDiv.setAttribute('id','info-' + review.book_slug);
					infoDiv.setAttribute('class','accordion-collapse collapse');
					infoDiv.setAttribute('aria-labelledby','header-' + review.book_slug);
					infoDiv.setAttribute('data-bs-parent','#ajax-results');
					
					
					infoBody = document.createElement('div');
					infoBody.setAttribute('class','accordion-body py-2');
					
					reviewTitle = document.createElement('p');
					reviewTitle.setAttribute('class','fw-bold');
					reviewTitle.innerHTML = review.title;
					
					reviewBody = document.createElement('p');
					reviewBody.innerHTML = review.review;
					
					
					buttonDiv = document.createElement('div');
					buttonDiv.setAttribute('class','d-flex flex-row justify-content-end');
					
					deleteButton = document.createElement('p');
					deleteButton.setAttribute('class','btn btn-outline-danger mb-1');
					deleteButton.innerHTML = '<i class="bi bi-trash3"></i>';
					
					editButton = document.createElement('p');
					editButton.setAttribute('class','btn btn-outline-secondary me-2 mb-1');
					editButton.innerHTML = '<i class="bi bi-pencil-square"></i>';
				});
				
				btnTitleDiv.append(title);
				btnTitleDiv.append(date);
				headerBtn.append(btnTitleDiv);
				header.append(headerBtn);
				
				infoBody.append(reviewTitle);
				infoBody.append(reviewBody);
				buttonDiv.append(editButton);
				buttonDiv.append(deleteButton);		
				infoBody.append(buttonDiv);
				infoDiv.append(infoBody);
				
				item.append(header);
				item.append(infoDiv);
				resultDiv.append(item);
				
				resultDiv.setAttribute('id','ajax-results-true');
			})
			.catch(err => {
				// Display errors in console
				console.log(err);
			});
		}
	}
	
	function setActive(category,id){
		prevActiveLink = document.getElementsByClassName('nav-link active');
		
		for(let i = 0; i <= prevActiveLink.length-1; i++){
			prevActiveLink[i].setAttribute('class', 'nav-link link-dark');
		}
		
		prevActiveBtn = document.getElementsByClassName('dropdown-item active');
		
		for(let i = 0; i <= prevActiveBtn.length-1; i++){
			prevActiveBtn[i].setAttribute('class', 'dropdown-item');
		}
		
		if(category == 4){			
			document.getElementById('prof-reviews-link').setAttribute('class','nav-link active');
			document.getElementById('prof-reviews-btn').setAttribute('class','dropdown-item active');
		}
		
		getData(category,id);		
	}
	

</script>