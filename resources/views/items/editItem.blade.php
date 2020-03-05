
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
            <h1>Add Item</h1>
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
                <h3 class="card-title">Add Item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="POST" action="{{ route('item.update',['id' => $item->id])}}" enctype="multipart/form-data">

                @csrf


                <div class="card-body">


                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" name="category_id">

                        <option>Select Category</option>

                        @foreach ($categories as $category)
                            
                            <option {{ ($item->category_id == $category->id) ? 'selected' : '' }}  value="{{$category->id}}">{{$category->name}}</option>
                      
                        @endforeach

                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputname1">Item Name</label>
                    <input name="name" type="text" value="{{$item->name}}" class="form-control {{$errors->has('name')}} ? 'is-danger' : ''" id="exampleInputname1" placeholder="Item Name">
                  </div>

                  <label for="exampleInputname1">Item Price</label>
                  <div class="input-group mb-3">
                    <input n name="price"  type="text"value="{{$item->price}}" class="form-control {{$errors->has('price')}} ? 'is-danger' : ''" id="exampleInputEmail1" placeholder="Item Price">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                  </div>


                  <div class="form-group">
                      <label for="exampleInputPassword1">Item Description</label>
                      <textarea name="description" class="textarea" placeholder="About Blog" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;">{{$item->description}}</textarea>
                  </div>





                  <div class="form-group">
                    <label for="exampleInputFile">Item Image</label>
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
                              alt="{{$item->name}}" width="200" height="200" src="{{asset($item->image)}}">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="Add Item">
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
