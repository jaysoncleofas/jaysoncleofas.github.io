@extends('layouts.app')

@section('title', 'Projects')

@section('content')

  @include('partials._nav-admin')

<div class="container mt-5">

   @if ($flash = session('message'))
      <div id="flash-messages" class="alert alert-success">
        {{ $flash }}
      </div>
   @endif
    <div class="row">
      <div class="col-lg-7">
        <div class="card mb-5">
          <div class="card-block">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="primary-color white-text">
                    <th>#</th>
                    <th>Name</th>
                    {{-- <th>Date</th> --}}
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($tags as $tag)
                    <tr>
                      <td>{{ $number++ }}</td>
                      <td><a href="{{ route('tags.edit', $tag->id) }}">{{ $tag->tag }}</a></td>
                      {{-- <td>{{ $tag->created_at->toFormattedDateString() }}</td> --}}
                      <td>
                        <form class="" action="{{ route('tags.destroy', $tag->id) }}" method="post">
                           {{ csrf_field() }} {{ method_field('DELETE') }}
                           <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this tag?')">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
         <div class="card">
            <div class="card-block">
               <form class="" action="{{ route('tags.store') }}" method="post" data-parsley-validate>
                  {{ csrf_field() }}
                  <div class="md-form {{ $errors->has('tag') ? 'has-danger' : '' }}">
                     <input type="text" name="tag" value="{{ old('tag') }}" class="form-control " required>
                     <label for="">Tag</label>
                     @if ($errors->has('tag'))
                        <span class="text-danger">
                           {{ $errors->first('tag') }}
                        </span>
                     @endif
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Add</button>
               </form>
            </div>
         </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')

  <script src="{{ asset('js/parsley.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    $('form').parsley();

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

  </script>

@endsection
