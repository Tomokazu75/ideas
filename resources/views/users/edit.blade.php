@extends('layout.layout')
@section('content')
<div class="row">
  <div class="col-3">
      @include('shared.left-sidebar')
  </div>
  <div class="col-6">
      @include('shared.success-message')
      <div class="mt-3">
        @include('shared.user-edit-card')
        <hr>
        @forelse ($ideas as $idea)
        <div class="mt-3">
            @include('shared.idea-card')
        </div>
        @empty
          <p class="text-center mt-4">No Results Found.</p>
        @endforelse
        <div class='mt-3'>
          {{$ideas->withQueryString()->links()}}
        </div>
      </div>
  </div>
  <div class="col-3">
    @include('shared.search-bar')
    @include('shared.follow-box')
  </div>
</div>
@endsection