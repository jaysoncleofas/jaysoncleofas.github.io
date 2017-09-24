<div class="card my-2">

<div class="card-up">
  <!-- <div class="card-header info-color text-center">
    <h4 class="white-text">Update Profile Picture</h4>
  </div> -->
</div>
<div class="card-block text-center">
  <img src="{{ asset('images/' . $user->avatar) }}" alt="user profile photo" class="img-fluid z-depth-1 my-2 wow slideInLeft mx-auto" style="height:150px;width:150px;border-radius:50%;">

  <form class="" action="{{ route('updateImage', $user->id) }}" enctype="multipart/form-data" method="post">
    {{ csrf_field() }}
    <div class="md-form {{ $errors->has('avatar') ? 'has-danger' : '' }}">
      <input type="file" name="avatar" value="" class="form-control">
      @if ($errors->has('avatar'))
        <span class="text-danger">
          <strong>{{ $errors->first('avatar') }}</strong>
        </span>
      @endif
    </div>
    <button class="btn btn-primary waves-effect waves-light" type="submit" name="button">Upload new photo</button>
    <br>
  </form>
  <form class="" action="{{ route('settings.destroy', $user->id) }}" method="post">
    {{ csrf_field() }}{{ method_field('DELETE') }}
    <button class="btn btn-danger waves-effect waves-light" type="submit" onclick="return confirm('Are yous sure you want to delete this photo?')" name="button">DELETE</button>
  </form>
</div>
</div>
