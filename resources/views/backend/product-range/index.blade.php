@extends('backend.layouts.master')

@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="row">
        <div class="col-md-12">
           @include('backend.layouts.notification')
        </div>
    </div>
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary float-left">Product Ranges Lists</h6>
     <a href="{{route('product-range.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Product Range"><i class="fas fa-plus"></i> Add Product Range</a>
   </div>
   <div class="card-body">
     <div class="table-responsive">
       @if(count($productRanges)>0)
       <table class="table table-bordered" id="product-range-dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>S.N.</th>
             <th>Title</th>
             <th>Summary</th>
             <th>Sort Order</th>
             <th>Status</th>
             <th>Photo</th>
             <th>Action</th>
           </tr>
         </thead>
         <tfoot>
           <tr>
             <th>S.N.</th>
             <th>Title</th>
             <th>Summary</th>
             <th>Sort Order</th>
             <th>Status</th>
             <th>Photo</th>
             <th>Action</th>
           </tr>
         </tfoot>
         <tbody>

           @foreach($productRanges as $productRange)
             <tr>
                 <td>{{$productRange->id}}</td>
                 <td>{{$productRange->title}}</td>
                 <td>{{Str::limit($productRange->summary, 50)}}</td>
                 <td>{{$productRange->sort_order}}</td>
                 <td>
                     @if($productRange->status=='active')
                         <span class="badge badge-success">{{$productRange->status}}</span>
                     @else
                         <span class="badge badge-warning">{{$productRange->status}}</span>
                     @endif
                 </td>
                 <td>
                     @if($productRange->photo)
                         <img src="{{$productRange->photo}}" class="img-fluid zoom" style="max-width:80px" alt="{{$productRange->photo}}">
                     @else
                         <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="No Image">
                     @endif
                 </td>
                 <td>
                     <a href="{{route('product-range.edit',$productRange->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                 <form method="POST" action="{{route('product-range.destroy',[$productRange->id])}}">
                   @csrf
                   @method('delete')
                       <button class="btn btn-danger btn-sm dltBtn" data-id={{$productRange->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                     </form>
                 </td>
             </tr>
           @endforeach
         </tbody>
       </table>
       <div class="row mt-3">
           <div class="col-sm-12 col-md-5">
               <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                   Showing {{ $productRanges->firstItem() }} to {{ $productRanges->lastItem() }} of {{ $productRanges->total() }} entries
               </div>
           </div>
           <div class="col-sm-12 col-md-7">
               <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                   <ul class="pagination">
                       {{ $productRanges->links('pagination::bootstrap-4') }}
                   </ul>
               </div>
           </div>
       </div>
       @else
         <h6 class="text-center">No Product Ranges found!!! Please create Product Range</h6>
       @endif
     </div>
   </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(5);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#product-range-dataTable').DataTable( {
        "scrollX": false
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[5,6]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush