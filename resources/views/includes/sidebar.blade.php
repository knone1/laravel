      <div class="col-md-3">
        <div class="card">
		  <div class="card-block card-inverse card-ios">
		    <h6 class="card-text">Latest Post</h6>
		  </div>
		  <div class="card-block">
		  @foreach ($recents as $recent)
		    <p class="card-text">
		    <img  data-original="http://i.imgur.com/bsCPi0f.jpg" class="thumb" width="30px" height="30px">&ensp; <b>{{ $recent->title}} </b>
		    <br/>
		    <small class="text-muted">{{ $recent->created_at }}</small>
		    </p>
		    <hr/>
		   @endforeach
		  </div>
		</div>
        <div class="card">
		  <div class="card-block card-inverse card-ios">
		    <h6 class="card-text">Popular Post</h6>
		  </div>
		  <div class="card-block">
		    <p class="card-text">
		    <img src="" width="30px" height="30px">&ensp;<span class="caret "></span>Title of blog<br/>
		    <small class="text-muted">12/12/12 12:00</small>
		    </p>
		    <hr/>
		    <p class="card-text">
		    <img src="" width="30px" height="30px">&ensp;<span class="caret "></span>Title of blog<br/>
		    <small class="text-muted">12/12/12 12:00</small>
		    </p>
		  </div>
		</div>
      </div>