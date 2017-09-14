@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-admin')
<br>
<div class="container mt-3">

    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="row">
          <div class="col-md-6">
            <h4 class="h4-responsive mt-1">Edit Tag</h4>
          </div>
        </div>

        <form action="{{ route('tags.update', $tag->id) }}" method="post" data-parsley-validate>
          {{ csrf_field() }} {{ method_field('PATCH') }}
          <div class="card mb-2 mt-1">
            <div class="card-block">
              <div class="md-form {{ $errors->has('tag') ? 'has-danger' : '' }}">
                <input type="text" class="form-control" name="tag" value="{{ $tag->tag }}"placeholder="" required="">
                <label for="">Tag</label>
                @if ($errors->has('tag'))
                  <span class="text-danger">
                    <strong>{{ $errors->first('tag') }}</strong>
                  </span>
                @endif
              </div>
            </div>
          </div>

          <div class="md-form mt-2 float-right">
            <a href="{{ route('tags.index') }}" class="btn btn-primary">Cancel</a>
          </div>
          <div class="md-form mt-2 float-right">
            <button type="submit" name="button" class="btn btn-success">Save Changes</button>
          </div>
        </form>

      </div>
    </div>
</div>
@endsection

@section('scripts')

  <script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $('form').parsley();
  </script>

@endsection
