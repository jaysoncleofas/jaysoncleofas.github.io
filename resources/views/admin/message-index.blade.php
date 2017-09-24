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
      <div class="col-sm-12 mx-auto">
        <h4 class="h4-responsive mt-1 mb-2">Your Messages</h4>
        <div class="card mb-5">
          <div class="card-block">

            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="primary-color white-text">
                    <!-- <th>#</th> -->
                    <th>Name</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($messages as $message)
                    <tr>
                      <!-- <td>{{ $number++ }}</td> -->
                      <td><i class="fa fa-user blue-text"></i> {{ $message->firstname }} {{ $message->lastname }}</td>
                      <td class="teal-text">{{ substr($message->message, 0, 50) }}{{ strlen($message->message) > 50 ? "..." : "" }}</td>
                      <td>{{ date('M j, Y', strtotime($message->created_at)) }}</td>
                      <td>
                        <form class="" action="{{ route('messages.destroy' , $message->id) }}" method="post">
                           {{ csrf_field() }} {{ method_field('DELETE') }}
                           <a href="{{ route('messages.show', $message->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                             <i class="fa fa-eye"></i>
                           </a>
                           <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                               <i class="fa fa-trash"></i>
                           </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
              <hr>
              Total:<span class="badge green">{{ $messages->total() }} <i class="fa fa-envelope"></i></span>
              <div class="float-right">
                {{ $messages->links('vendor.pagination.bootstrap-4') }}
              </div>
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
