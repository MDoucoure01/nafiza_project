<div class="container">
    <div class="card-top"></div>
    <div class="card locked">
        <h1 class="title"><span>{{ env('APP_NAME') }}</span>Pointage</h1>
        <div class="col-sm-12">
          <div class="thumb">
            @if ($student->profile_photo_path)
                <img class="media-object" src="{{ asset('storage') }}/{{ $student->user->profile_photo_path }}" alt="">
            @else
                <img class="media-object" src="{{ asset('backoffice/assets/images/logo.png') }}" alt="">
            @endif
            <h5 class="media-heading">{{ $student->user->firstname.' '.$student->user->lastname }}</h5>
          </div>
        </div>
        <div class="col-sm-12">

        </div>
    </div>
</div>
