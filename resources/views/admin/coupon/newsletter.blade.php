
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
          <h6 class="card-body-title">Subscribers List

            <a href="" class="btn btn-sm btn-danger" style="float:right;">Delete marked items</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Subscription Date</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($newsletter as $row)
                <tr>
                  <td> <input type="checkbox" name=""> {{ $loop->index + 1 }}</td>
                  <td>{{ $row -> email }}</td>
                  <td>{{ \Carbon\Carbon::parse($row -> created_at)->diffForhumans() }}</td>
                  <td>
                  	<a href="{{ URL::to('delete/newsletter/'.$row->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

      
@endsection

 