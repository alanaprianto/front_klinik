extends('layout.layout')
@section('title')
<title>kepegawaian .: Teknohealth :. </title>
<link rel="icon" href="assets/images/logo/logo-sm.png">
@endsection
@section('module-title')
<div class="module-left-title">
    <div class="module-left-bars"><i class="ti-menu"></i></div>
    <img src="assets/images/logo/kepegawaian.png">
    <span>KEPEGAWAIAN</span>
</div>
@endsection
@section('nav')
   @include('layout.navKepegawaian')
@endsection
@section('module-content-container')
       <nav class="navbar navbar-static-top nav-title" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <ul>
                <h3>Tambah STAFF Position</h3>
            </ul>
        </div>
    </nav>
@endsection
@section('content')
    <div id="staffJob-area" ng-controller="StaffCtrl" >
        <div class="row no-margin">
          <form class="form-horizontal" role="form" method="POST"
              action="{{url('')}}"
              enctype="multipart/form-data">
            {{ csrf_field() }}
                <input type="hidden" name="staffposition_id" value="">

            <div class="form-group">
                <label for="staffjob" class="col-md-4 control-label">Name <span class="error">*</span> </label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required
                           value="" placeholder="Name" required autofocus>
                        <span class="help-block">
                                        <strong></strong>
                         </span>
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="col-md-4 control-label">Description </label>
                <div class="col-md-6">
                    <textarea class="form-control" rows="5"  name="desc"></textarea>
                        <span class="help-block">
                                        <strong></strong>
                                    </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
            <p class="error"> (*) mohon untuk di isi  </p>
        </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="views/staffPosition/staffPosition.js"></script>
@endsection
