<div class="container">
    <div class="card-top"></div>
    <div class="card locked">
        <h1 class="title"><span>{{ env('APP_NAME') }}</span></h1>
        <div class="col-sm-12">
          <div class="thumb">
            <img class="media-object" style="width: 100%; height: 150px; object-fit: cover;" src="{{ asset('backoffice/assets/images/logo.png') }}" alt="">
            <h5 class="media-heading">Effectuer mon paiement</h5>
          </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('payment.initial') }}" class="btn btn-raised waves-effect g-bg-blush2">Effectuer paiement</a>
                </div>
                {{-- <div class="col-sm-12 text-center"> <a href="sign-in.html">Feuille de présence !</a> </div> --}}
            </div>
        </div>
    </div>
</div>
