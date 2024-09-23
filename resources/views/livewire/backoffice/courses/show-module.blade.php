<!-- main content -->
<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Gestion de module</h2>
            <small class="text-muted">Welcome to Swift application</small>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>A propos</h2>
                    </div>
                    <div class="body">
                        <p class="m-b-0">Module</p>
                        <h4 class="col-blush">{{ $module->name }}</h4>
                        <p class="m-b-0">Début</p>
                        <h4>{{ \Carbon\Carbon::parse($module->start_date)->format('d-m-Y') }}</h4>
                        <p class="m-b-0">Fin</p>
                        <h4>{{ \Carbon\Carbon::parse($module->end_date)->format('d-m-Y') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">Description</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#courses">Cours</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#update">Modification</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="description">
                                <p>{{ $module->description }}</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="courses">
                                <div class="row clearfix">
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="thumbnail card">
                                            <img src="assets/images/course-3.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Magento Programmer Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="thumbnail card">
                                            <img src="assets/images/course-1.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Magento Programmer Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                        <div class="thumbnail card"><img src="assets/images/course-2.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>PHP Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-3.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Web Design Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-1.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Magento Programmer Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-2.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>PHP Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-3.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Magento Programmer Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-1.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Magento Programmer Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-2.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>PHP Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-3.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Web Design Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-1.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>Magento Programmer Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                        <div class="thumbnail card"><img src="assets/images/course-2.jpg" alt=""  class="img-fluid">
                                            <div class="caption  body">
                                                <h3>PHP Course</h3>
                                                <p>First Year, MBA</p>
                                                <p>Price: <strong class="col-blush">$315.60</strong> Time: <strong class="col-green">9 months</strong></p>
                                                <p>Prof.: Prof. <strong>Will Smith</strong></p>
                                                <p>Students: <strong class="col-green">115</strong></p>
                                                <a href="courses-info.html" class="btn  btn-raised btn-info waves-effect" role="button">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <a href="#" class="btn btn-raised waves-effect g-bg-blush2" role="button">Load more</a>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="update">
                                <h5>Modifer le module</h5>
                                <form class="form-horizontal" action="{{ route('module.create') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email_address_2">Nom du module</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group mt-0 mb-4">
                                                <div class="form-line">
                                                    <input required name="name" value="{{ old('name') }}" type="text"
                                                        class="form-control" placeholder="Entrer le nom du module">
                                                    @error('name')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label>Période</label>
                                        </div>
                                        <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-7">
                                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-7">
                                                <div class="form-group mt-0 mb-4">
                                                    <div class="form-line">
                                                        du: <input required name="start_date" value="{{ old('start_date') }}"
                                                            type="date" class="form-control">
                                                        @error('start_date')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-7">
                                                <div class="form-group mt-0 mb-4">
                                                    <div class="form-line">
                                                        au: <input required name="end_date" value="{{ old('end_date') }}"
                                                            type="date" class="form-control">
                                                        @error('end_date')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group mt-0 mb-4">
                                                <div class="form-line">
                                                    <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="offset-lg-2 col-lg-10 text-right">
                                            <button type="submit" class="btn btn-raised btn-warning m-t-15 waves-effect">Créer cohorte</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="plans row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <ul class="planContainer">
                                    <li class="title"><h2>Plan 1</h2></li>
                                    <li class="price"><p>$10/<span>month</span></p></li>
                                    <li>
                                        <ul class="options">
                                            <li>2x <span>option 1</span></li>
                                            <li>Free <span>option 2</span></li>
                                            <li>Unlimited <span>option 3</span></li>
                                            <li>Unlimited <span>option 4</span></li>
                                            <li>1x <span>option 5</span></li>
                                        </ul>
                                    </li>
                                    <li><a  class="btn btn-raised btn-success" href="#">Purchase</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <ul class="planContainer">
                                    <li class="title"><h2 class="bestPlanTitle">Plan 2</h2></li>
                                    <li class="price"><p class="bestPlanPrice">$20/month</p></li>
                                    <li>
                                        <ul class="options">
                                            <li>2x <span>option 1</span></li>
                                            <li>Free <span>option 2</span></li>
                                            <li>Unlimited <span>option 3</span></li>
                                            <li>Unlimited <span>option 4</span></li>
                                            <li>1x <span>option 5</span></li>
                                        </ul>
                                    </li>
                                    <li><a class="btn btn-raised btn-success" href="#">Purchase</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <ul class="planContainer">
                                    <li class="title"><h2>Plan 3</h2></li>
                                    <li class="price"><p>$30/<span>month</span></p></li>
                                    <li>
                                        <ul class="options">
                                            <li>2x <span>option 1</span></li>
                                            <li>Free <span>option 2</span></li>
                                            <li>Unlimited <span>option 3</span></li>
                                            <li>Unlimited <span>option 4</span></li>
                                            <li>1x <span>option 5</span></li>
                                        </ul>
                                    </li>
                                    <li><a class="btn btn-raised g-bg-blush2" href="#">Purchase</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <ul class="planContainer">
                                    <li class="title"><h2>Plan 4</h2></li>
                                    <li class="price"><p>$40/<span>month</span></p></li>
                                    <li>
                                        <ul class="options">
                                            <li>2x <span>option 1</span></li>
                                            <li>Free <span>option 2</span></li>
                                            <li>Unlimited <span>option 3</span></li>
                                            <li>Unlimited <span>option 4</span></li>
                                            <li>1x <span>option 5</span></li>
                                        </ul>
                                    </li>
                                    <li><a  class="btn btn-raised btn-primary" href="#">Purchase</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</section>
<!-- main content -->
