<div class="card">
  <div class="px-3 pt-4 pb-2">
    <form enctype="multipart/form-data" method="POST" action="{{route('users.update', $user->id)}}">
      @csrf
      @method('put')
      <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
              <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                  src="{{$user->getImageUrl()}}" alt="Mario Avatar">
              <div>
                    <input name="name" type="test" class="form-control" value="{{$user->name}}">
                    @error('name')
                        <span class="text-danger fs-6">{{$message}}</span>
                    @enderror
              </div>
          </div>
          <div>
            @auth
              @if (Auth::id() === $user->id)
                <a href="{{route('users.show', $user->id)}}">View</a>
              @endif
            @endauth
          </div>
      </div>
      <div class="mt-4">
        <label for="">Profile Picture</label>
        <input type="file" name="image" class="form-control">
        @error('name')
          <span class="text-danger fs-6">{{$message}}</span>
        @enderror
      </div>
      <div class="px-2 mt-4">
          <h5 class="fs-5"> Bio : </h5>
            <textarea name="bio" class="form-control" id="bio" rows="3">{{$user->bio}}</textarea>
            @error('bio')
                <span class="fs-6 text-danger d-block mt-2">{{$message}}</span>
            @enderror
            <button class="btn btn-danger btn-sm mt-3 mb-2">Save</button>
          <div class="d-flex justify-content-start">
              <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                  </span> 0 Followers </a>
              <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                  </span>{{$user->ideas()->count()}}</a>
              <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                  </span>{{$user->comments()->count()}}</a>
          </div>
      </div>
    </form>
  </div>
</div>