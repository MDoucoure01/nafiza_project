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
            <form id="sign_in" method="POST" action="{{ route('student.point', ['student_id' => $student->id]) }}">
                @csrf
                @method('PUT')
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-calendar"></i> </span>
                    <div class="form-line">
                        <select name="seance_id" class="form-control" required>
                            <option value="">__ Sélectionner la séance __</option>
                            @foreach ($seances as $item)
                                <option value="{{ $item->id }}">{{ $item->course->title.' - '.\Carbon\Carbon::parse($item->date)->translatedFormat('l d F Y') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-calendar"></i> </span>
                    <div class="form-line">
                        <select name="status" class="form-control" required>
                            <option value="">__ Type de Pointage __</option>
                            <option value="arrived">Pointage d'arrivé</option>
                            <option value="leaving">Pointage de sortie</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-raised waves-effect g-bg-blush2">Valider</button>
                    </div>
                    <div class="col-sm-12 text-center"> <a href="sign-in.html">Feuille de présence !</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>
