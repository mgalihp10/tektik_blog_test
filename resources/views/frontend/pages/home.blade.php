@extends('frontend.layouts.app')

@section('contents')
<div class="row justify-content-md-center">
	<div class="col-12">
		<h4>Latest Blog</h4>
	</div>
	@if(sizeof($blogs) != 0)
		<div class="row mb-2">
			@foreach($blogs as $bg)
	    <div class="col-md-4">
	      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
	        <div class="col p-4 d-flex flex-column position-static">
	          <strong class="d-inline-block mb-2 text-primary">{{ $bg->authors }}</strong>
	          <h3 class="mb-0">{{ $bg->blogs_title }}</h3>
	          <div class="mb-1 text-muted">{{ $bg->published_at }}</div>
	          <p class="card-text mb-auto">{{ $bg->blogs_desc }}</p>
	          <a href="{{ route('article', $bg->id) }}" class="stretched-link">Continue reading</a>
	        </div>
	        <div class="col-auto d-none d-lg-block">
	          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

	        </div>
	      </div>
	    </div>
	    @endforeach
	  </div>
		<div class="row">
			<div class="col-12 text-center">
				{{ $blogs->links() }}
			</div>
		</div>
	@endif
</div>
@endsection