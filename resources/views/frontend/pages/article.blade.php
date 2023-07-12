@extends('frontend.layouts.app')

@section('contents')
<main class="container">
  <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
      <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
      <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-md-8">
      <article class="blog-post">
        <h2 class="blog-post-title mb-1">{{ $blog->blogs_title }}</h2>
        <p class="blog-post-meta">{{ date('F n, Y') }} by <a href="#">{{ $blog->authors }}</a></p>

        {{ strip_tags($blog->blogs_contents) }}
      </article>
    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2021</a></li>
            <li><a href="#">February 2021</a></li>
            <li><a href="#">January 2021</a></li>
            <li><a href="#">December 2020</a></li>
            <li><a href="#">November 2020</a></li>
            <li><a href="#">October 2020</a></li>
            <li><a href="#">September 2020</a></li>
            <li><a href="#">August 2020</a></li>
            <li><a href="#">July 2020</a></li>
            <li><a href="#">June 2020</a></li>
            <li><a href="#">May 2020</a></li>
            <li><a href="#">April 2020</a></li>
          </ol>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

</main>
<main class="container mb-4">
	<div class="row">
		<div class="col-sm-8">
	    <div class="card">
	      <div class="card-body">
	        <h5 class="card-title">Leave your comment here!</h5>
	        @if(!Auth::user())
	        <div class="row">
	        	<div class="col-md-12 text-center">
	        		<p>Anda belum login!</p>
	        	</div>
	        </div>
	        @else
	        <form method="POST" action="{{ route('store_comment') }}">
	        	@csrf
					  <div class="form-row">
					    <div class="form-group col-md-12 col-12">
					      <label for="inputEmail4">Email</label>
					      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
					    </div>
					    <div class="form-group col-md-12 col-12">
					      <label for="fullname">Full Name</label>
					      <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" value="{{ Auth::user()->fullname }}">
					    </div>
					  </div>
					  <div class="form-row">
					    <div class="form-group col-md-12 col-12 @error('comments') has-validation @enderror">
					      <label for="comment">Comments</label>
					      <textarea class="form-control @error('comments') is-invalid @enderror" id="comment" placeholder="Your comments..." rows="5" name="comments"></textarea>
					      @error('comments')
					      	<label class="invalid-feedback">{{ $message }}</label>
					      @enderror
					    </div>
					  </div>
					  <button type="submit" class="btn btn-primary">Submit</button>
					  <input type="hidden" name="id_blog" value="{{ $blog->id }}">
					</form>
					@endif
	      </div>
	    </div>
	  </div>
	</div>
</main>
<main class="container mb-4">
	<h4>Comment Section</h4>
	<div class="row">
		@if(sizeof($comments) != 0)
			@foreach($comments as $cm)
			<div class="col-sm-8">
		    <div class="card">
		    	<div class="card-body">
		    		<div class="row">
		    			<div class="col-md-6">
		    				<h6 class="card-title">{{ $cm->fullname }}</h6>
		    			</div>
		    			@if(Auth::user())
		    			<div class="col-md-6 text-end">
		    				@if(Auth::user()->id == $cm->user_id)
		    				<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $cm->id }}">edit</a>
		    				<a href="{{ route('delete_comments', $cm->id) }}">delete</a>
		    				@endif
		    			</div>
		    			@endif
		    		</div>
		    		<p>{{ $cm->comments }}</p>
		    	</div>
		    </div>
		  </div>
		  @endforeach
	  @endif
	</div>
</main>

@if(sizeof($comments) != 0)
	@foreach($comments as $cm)
	<div class="modal fade" id="exampleModal-{{ $cm->id }}">
	  <div class="modal-dialog">
	  	<form method="POST" action="{{ route('update_comments', $cm->id) }}" novalidate="">
	      @csrf
		    <div class="modal-content">
		      <div class="modal-header">
		        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <div class="form-row">
					    <div class="form-group col-md-12 col-12 @error('comments') has-validation @enderror">
					      <label for="comment">Comments</label>
					      <textarea class="form-control @error('comments') is-invalid @enderror" id="comment" placeholder="Your comments..." rows="5" name="comments"></textarea>
					      @error('comments')
					      	<label class="invalid-feedback">{{ $message }}</label>
					      @enderror
					    </div>
					  </div>
					  <input type="hidden" name="id_comment" value="{{ $cm->id }}">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </form>
	  </div>
	</div>
	@endforeach
@endif
@endsection