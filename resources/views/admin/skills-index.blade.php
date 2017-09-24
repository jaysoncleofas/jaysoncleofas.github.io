@extends('layouts.app')

@section('title', 'Skills')

@section('content')

  @include('partials._nav-admin')

<br>
<div class="container mt-5">
    <div class="row">
      <div class="col-sm-12">
        <h4 class="h4-responsive mb-2">Your Messages</h4>
      </div>
      <div class="col-lg-3">

        <div class="card-body">
          <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addskills" name="button">
            <i class="fa fa-plus"></i> New Skill
          </button>
          <div class="mt-2">

            <small></small>
            <div class="list-group z-depth-0 pb-3">


              <a href="/skills" class="list-group-item justify-content-between">

                <i class="fa fa-circle skills-cat green-text"></i>
                Total
                <span class="badge badge-primary float-right">{{ $skill->count() }}</span>

              </a>
              @if (Session::has('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif

              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    {{ $error }}
                  @endforeach
                </div>
              @endif
			</div>
          </div>
        </div>
      </div>

      <div class="col-lg-9">
         @if ($flash = session('message'))
            <div id="flash-messages" class="alert alert-danger">
               {{ $flash }}
            </div>
         @endif
        <div class="card mb-5">
          <div class="card-block">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="primary-color white-text">
                  <tr>
                    <th>#</th>
                    <th>Skills</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($skill as $skills)
                  <tr>
                      <td scope="row">{{ $number++ }}</td>
                      <td><a href="" data-target="" data-toggle="modal" class="teal-text">{{ $skills->skill }}</a></td>
                      <td><img src="{{ asset('images/' . $skills->image) }}" class="img-thumbnail" alt="" style="width:100px;"></td>

                      <td>{{ $skills->created_at->toFormattedDateString()}}</td>
                      <td>
                        <form class="" action="{{ route('skills.destroy', $skills->id) }}" method="post">
                           {{ csrf_field() }}{{ method_field('DELETE') }}
                           <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                              <i class="fa fa-times"></i>
                           </button>
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
