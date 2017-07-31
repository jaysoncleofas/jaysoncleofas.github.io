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
      <div class="col-lg-12 mx-auto">
        <div class="card">
          <div class="card-block">

            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="primary-color white-text">
                    <th>#</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($messages as $message)
                    <tr>
                      <td>{{ $message->id }}</td>
                      <td>{{ $message->firstname }} {{ $message->lastname }}</td>
                      <td>{{ substr($message->message, 0, 50) }}{{ strlen($message->message) > 50 ? "..." : "" }}</td>
                      <td>{{ date('M j, Y', strtotime($message->created_at)) }}</td>
                      <td>
                        <a href="{{ route('messages.show', $message->id) }}" class="blue-text mr-2">
                            <i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="View"></i>
                        </a>
                        <form class="" action="{{ route('messages.destroy' , $message->id) }}" method="post">
                           {{ csrf_field() }} {{ method_field('DELETE') }}
                           <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                               <i class="fa fa-times"></i>
                           </button>
                        </form>
                        <a href="{{ route('messages.destroy', $message->id) }}" class="red-text">

                        </a>
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
