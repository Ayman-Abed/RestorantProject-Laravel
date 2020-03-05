
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
            <h1>General Form</h1>
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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="POST" action="{{ route('users.store')}}">

                @csrf


                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputname1">User Name</label>
                    <input name="name" type="text" value="{{old('name')}}" class="form-control {{$errors->has('name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="User Name">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input  name="email"  type="email"value="{{old('email')}}" class="form-control {{$errors->has('email')}} ? 'is-danger' : ''" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password"   type="password" value="{{old('password')}}" class="form-control {{$errors->has('password')}} ? 'is-danger' : ''" id="exampleInputPassword1" placeholder="Password">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Add User">
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
