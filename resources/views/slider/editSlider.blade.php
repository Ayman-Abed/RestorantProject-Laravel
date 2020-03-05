
@include('includedDashboard.header')


<div class="wrapper">



    <!-- Navbar -->
    @include('includedDashboard.navbar')

    <!-- /.navbar -->




    {{-- Sidbar --}}
    @include('includedDashboard.sidbar')
    {{-- Sidbar --}}


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Slider</h1>
          </div>
  
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            @if ($errors->count() > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li >{{$error}}</li>

                    @endforeach
                </ul>
            @endif



            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Slidar : {{$slider->title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="POST" action="{{ route('slider.update',['id' => $slider->id])}}" enctype="multipart/form-data">

                @csrf


                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputname1">Title</label>
                    <input name="title" type="text" value="{{$slider->title}}" class="form-control {{$errors->has('title')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Title">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Sub Title</label>
                    <input  name="sub_title"  type="text"value="{{$slider->sub_title}}" class="form-control {{$errors->has('sub_title')}} ? 'is-danger' : ''" id="exampleInputEmail1" placeholder="Sub Title">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Slidar Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    <br>
                    <img class="img-fluid img-thumbnail"
                              alt="{{$slider->title}}" width="200" height="200" src="{{asset($slider->image)}}">
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Update Slidar">
                </div>

                
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
   

        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  






  @include('includedDashboard.footer')
