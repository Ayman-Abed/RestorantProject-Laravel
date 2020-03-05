
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$users->count()}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('users.index')}}" class="small-box-footer">Users <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>




          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$categories->count()}} / {{$items->count()}}</h3>

                <p>Categories / Items</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="{{ route("category.index")}}" class="small-box-footer">category<i class="fas fa-fw fa-folder"></i></a>
            </div>
          </div>



          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$contacts->count()}}</h3>

                <p>Contact</p>
              </div>
              <div class="icon">
               <i class="fas fa-comments"></i>
              </div>
              <a href="{{ route("contact.index")}}" class="small-box-footer">Contact <i class="fas fa-comments"></i></a>
            </div>
          </div>






          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $reservations->count()}}</h3>

                <p>Reservation</p>
              </div>
              <div class="icon">
                <i class="fas fa-notes-medical"></i>
              </div>
              <a href="#" class="small-box-footer">Reservation <i class="fas fa-notes-medical"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    
        <br>
        <br>
        <br>



                          {{-- For success To update user --}}
          @if (session()->has('confirmMassage'))
              <div class="row">
                  <div class="col-md-12">

                    <div class="alert alert-success">

                      <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                      </button>
                        <strong>Notification : </strong> {{ session()->get('confirmMassage') }} 
                    </div>
                </div>
              </div>
          @endif



                                    {{-- For success To update user --}}
          @if (session()->has('notCconfirmMassage'))
              <div class="row">
                  <div class="col-md-12">

                    <div class="alert alert-danger">

                      <button  type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;
                      </button>
                        <strong>Notification : </strong> {{ session()->get('notCconfirmMassage') }} 
                    </div>
                </div>
              </div>
          @endif


        <br>




        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Reservation Table</h3>
            </div>
   
                
            <div class="card-body">
                      <!-- /.card-header -->
              @if ($reservations->count() == 0)
                  <div class="alert alert-danger">
                          No reservations Found
                  </div>
              @else


              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Date & Time </th>
                  <th>Massage</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Change</th>
                </tr>
                </thead>
                  <tbody>
                    <?php $id = 1;?>

                    @foreach ($reservations as $reservation)
                        
                        <tr>
                          <td>{{$id++}}</td>
                          <td>{{$reservation->name}}</td>
                          <td>{{$reservation->email}}</td>
                          <td>{{$reservation->phone}}</td>
                          <td>{{$reservation->date_and_time}}</td>
                          <td>{{$reservation->massage}}</td>

                          <td>
                            @if ($reservation->status == "1")
                                <a href="{{ route('reservation.notConfrimed',['id' => $reservation->id])}}">
                                  <span class="badge badge-success">Confirmmed</span>
                                <a>

                            @else
                                <a href="{{ route('reservation.confrimed',['id' => $reservation->id])}}">
                                  <span class="badge badge-danger">not Confirmmed</span>
                                <a>
                                
                            @endif
                          </td>
                    
                          <td>{{$reservation->created_at->toFormattedDateString()}}</td>
                          <td>
                              <a  style="margin: 5px; text-decoration: none;" href="{{ route('reservation.deleteReservation',['id' => $reservation->id])}}">
                                  <i style="color:red;" class="fas fa-trash-alt"></i>
                              </a>
                          </td>
                        </tr>
                    
                    @endforeach
                  </tbody>
              </table>
              @endif

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>







@include('includedDashboard.footer')




