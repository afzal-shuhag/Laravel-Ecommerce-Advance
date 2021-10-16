

@extends('admin.admin_layouts')

@section('admin_content')



	<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
      </nav>

      <div class="sl-pagebody">
  <!--       <div class="sl-page-title">
          <h5>Data Table</h5>
          <p>DataTables is a plug-in for the jQuery Javascript library.</p>
        </div> sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Edit Coupon</h6>


          <div class="table-wrapper">
             @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               <form action="{{ route('update.coupon', $coupon->id) }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Coupon Code</label>
                  <input type="text" value="{{ $coupon->coupon }}" name="coupon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>            <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Coupon Code</label>
                  <input type="text" value="{{ $coupon->discount }}" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->



        

      
@endsection

 