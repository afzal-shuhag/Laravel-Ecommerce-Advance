
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
          <h6 class="card-body-title">Edit SubCategory</h6>


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
               <form action="{{ route('update.subcat', $subcat->id) }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">SubCategory Name</label>
                  <input type="text" value="{{ $subcat->subcategory_name }}" name="subcategory_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Select Category</label>
                  <select name="category_id" class="form-control">
                    @foreach($category as $row)
                    <option value="{{ $row->id }}" {{ $row->id == $subcat->category_id ? 'selected' : '' }}>{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->



        

      
@endsection

 