@extends('backend.layouts.app')

@section('contents')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title"> Data table </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data table</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-3 mb-3">
      <a href="{{ route('blog_add') }}" type="button" class="btn btn-primary btn-lg btn-block">
        <i class="mdi mdi-pencil"></i> Add Article
      </a>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Data table</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>ID #</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Authors</th>
                  <th>Status</th>
                  <th>Published At</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(sizeof($blogs) != 0)
                  @foreach($blogs as $blog)
                  <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->blogs_title }}</td>
                    <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $blog->blogs_desc }}</td>
                    <td>{{ $blog->authors }}</td>
                    <td>
                      @if($blog->status == "Draft")
                        <label class="badge badge-info">{{ $blog->status }}</label>
                      @else
                        <label class="badge badge-success">{{ $blog->status }}</label>
                      @endif
                    </td>
                    <td>@if($blog->published_at != null) {{ $blog->published_at }} @else - @endif</td>
                    <td>{{ $blog->created_at }}</td>
                    <td>
                      <a href="{{ url('/backend/blog/edit/'.$blog->id) }}" class="btn btn-outline-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection