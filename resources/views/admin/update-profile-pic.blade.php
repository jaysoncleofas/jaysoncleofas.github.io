<div class="card mb-2 mt-2" style="padding-top:10px;">
   <div class="card-block text-center">
      <div class="form-header indigo">
         Update Profile Picture
      </div>
      <img src="{{ asset($user->avatar) }}" alt="user profile photo" class="img-fluid z-depth-1 mb-2 wow slideInLeft mx-auto" style="height:150px;width:150px;border-radius:50%;">
      <form class="" action="{{ route('updateImage', $user->id) }}" enctype="multipart/form-data" method="post">
         {{ csrf_field() }}
         <div class="md-form {{ $errors->has('avatar') ? 'has-danger' : '' }}">
            <input type="file" name="avatar" value="" class="form-control" required>
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
         <button class="btn btn-danger waves-effect waves-light" type="submit" onclick="return confirm('Are yous sure you want to delete this photo?')" name="button">Remove photo</button>
      </form>
   </div>
</div>
