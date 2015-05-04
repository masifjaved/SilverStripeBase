<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
        <div class="container">
		    <% loop $MenuProducts %>
				<div class="row">
			    	<div class="col-md-2">
					    <div class="image">															
									$Photo.CroppedImage(200,180)
					    </div>
                    </div>
                    
			    	<div class="col-md-2">
					    $Category.Title
                    </div>
			    	<div class="col-md-6">
	                    <h3>$Title</h3>
                    </div>
			    	<div class="col-md-2">
				    	<div class="price">
						    <span>$Price.Nice</span>
						</div>
					</div>
                </div>
            <% end_loop %>
        </div>
	</article>
		$Form
		$CommentsForm
</div>
