@extends('admin.layout.blank')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create New Order</h1> <!-- here we can add title to every page -->
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
  
  

<form method="POST" action="{{route('orders.store')}}">
@csrf
<div class=" px-5">
    <div class="container px-5 Container">
    <div class="row medicineRow">
        <div class="col-4 Container">
    <label for="exampleFormControlSelect1">User</label>
    <select class="form-control mb-4" id="userSelect" name="order_user_id">
      <option ></option>
      @foreach ($users as $user)
       <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
 
  <div class="container px-5 Container">
  
        <label for="exampleFormControlInput1">Medicine Name</label>
        <select  class="form-control mb-4 medicineNameSelect">
          @foreach ($medicines as $medicine)
          <option ></option>
           <option value="{{$medicine->name}}">{{$medicine->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="container px-5 Container">
        <label for="">Medicine Type</label>
        <select   class="form-control mb-4 medicineTypeSelect">
          <option ></option>
          @foreach ($medicines as $medicine)
           <option value="{{$medicine->type}}">{{$medicine->type}}</option>
          @endforeach
        </select>
      </div>
      <div class="container px-5 Container">
        <label for="">Quantity</label>
      <input type="number" class="form-control mb-4 quantity" >
      </div>
      <div class="container px-5 Container">
        <label for="">Price</label>
      <input type="number" class="form-control mb-4 price" >
      </div>
      
        <button class="btn btn-success add" id="addMedBtn" type="button"  style="width:80%;">add new medicine</button>
        <button class="btn btn-danger delete" type='button'>delete the medicine</button>
      
    </div>
    
    
  </div>

  <div class="form-group px-5">
    <label for="" >is insured</label>
    <input type="checkbox" name="is_insured" value='1'>
  </div>
  <div class="form-group px-5">
    <label for="exampleFormControlInput1">Statues</label>
    <select name="status_id"  class="form-control  @auth('admin') {{ 'disabled' }} @endauth" >
      @foreach ($statuses as $s=>$v)
      <option value={{$v}} >{{$s}}</option>
      @endforeach

    </select>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-success d-block mx-auto" style="width:80%;">Add order and calculate the price</button>
  </div>

</form>
<div class="container">
  <div class="row text-left">
    <div class="col">
      <p>Total Price: <span id="totalPrice"></span></p>
    </div>
  </div>
</div>

<select class="form-control mb-4 medData d-none">
  <option ></option>
  @foreach ($medicines as $medicine)
   <option value="{{$medicine->name}}">{{$medicine->name}}</option>
  @endforeach
</select>

<select  class="form-control mb-4 typeData d-none">
  <option ></option>
  @foreach ($medicines as $medicine)
   <option value="{{$medicine->type}}">{{$medicine->type}}</option>
  @endforeach
</select>



  @endsection