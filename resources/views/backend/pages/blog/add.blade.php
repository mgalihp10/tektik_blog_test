@extends('backend.layouts.app')

@section('contents')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Add Article </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Blogs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Article</li>
      </ol>
    </nav>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create your article!</h4>
      @if (Session::has('message'))
      	<div class="alert alert-info">{{ Session::get('message') }}</div>
      @endif
      <form class="forms-sample" method="POST" action="{{ route('save_blog') }}">
      	@csrf
        <div class="form-group @error('title') has-danger @enderror">
          <label>Title *</label>
          <input name="title" type="text" class="form-control p_input @error('title') form-control-danger @enderror">
          @error('title')
            <label class="error mt-2 text-danger">{{ $message }}</label>
          @enderror
        </div>
        <div class="form-group @error('blogs_image') has-danger @enderror">
          <label>URL image *</label>
          <input name="blogs_image" type="text" class="form-control p_input @error('blogs_image') form-control-danger @enderror">
          @error('blogs_image')
            <label class="error mt-2 text-danger">{{ $message }}</label>
          @enderror
        </div>
        <div class="form-group">
          <label for="status_blog">Status</label>
          <select class="form-control" id="status_blog" name="status_blog">
          	@foreach($status_blog as $status)
            <option value="{{ $status->status }}">{{ $status->status }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group @error('blogs_desc') has-danger @enderror">
          <label for="exampleTextarea1">Preview *</label>
          <textarea class="form-control @error('blogs_desc') form-control-danger @enderror" id="exampleTextarea1" rows="3" name="blogs_desc"></textarea>
          @error('blogs_desc')
            <label class="error mt-2 text-danger">{{ $message }}</label>
          @enderror
        </div>
        <div class="form-group @error('blogs_contents') has-danger @enderror">
        	<label for="contents">Contents *</label>
        	<textarea id="contents" class="form-control @error('blogs_contents') form-control-danger @enderror" rows="6" name="blogs_contents"></textarea>
        	@error('blogs_contents')
            <label class="error mt-2 text-danger">{{ $message }}</label>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <button class="btn btn-dark">Cancel</button>
      </form>
    </div>
  </div>
</div>
@endsection