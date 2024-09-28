<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>All Courses</h2>
            <small class="text-muted">Welcome to Swift application</small>
        </div>
        <div class="row clearfix">
            @foreach ($courses as $item)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="thumbnail card">
                        <div class="caption  body">
                            <h3>{{ $item->title }}</h3>
                            <p>Module: <strong class="col-green">{{ $item->module->name }}</strong></p>
                            <p>Type: <strong class="col-green">{{ $item->courseType->name }}</strong></p>
                            <a href="{{ route('course.show', ['id' => $item->id]) }}" class="btn  btn-raised btn-info waves-effect" role="button">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
