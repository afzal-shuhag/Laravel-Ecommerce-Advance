

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
          <h6 class="card-body-title">Edit Brand</h6>


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
               <form action="{{ route('update.brand', $brand->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                  <input type="text" value="{{ $brand->brand_name }}" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Previous Logo</label>
                  <td> <img src="{{ URL::to($brand->brand_logo) }}" height="80px"> </td>
                </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">New Logo</label>
                  <input type="file" name="brand_logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->



        

      
@endsection

 