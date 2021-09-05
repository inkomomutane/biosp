@extends('web.backend.admin.layout.layout')

@push('ccs')
  <!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endpush
@section('content')

<div >
    <a href="{{route('province.create')}}" class="btn btn-icon btn-lg btn-success" >add</a>
 </div><br/>
<div class="card"  style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
    <div class="card-header">
        Lista de Provincias
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped v_center" id="table-2">
                <thead>
                    <tr style="box-shadow: 1px 1px 1px 1px rgba(0,0,0, 0.1)">
                    <th>uuid</th>
                    <th>Nome</th>
                    <th>Data de Nasc</th>
                    <th>Telefone</th>
                    <th>deleted_at</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($benificiaries as $benificiarie)
                    <tr>
                        <td class="d-inline-block text-truncate" style="max-width: 10px;">{{$benificiarie->uuid}}</td>
                        <td class="text-truncate" style="max-width: 100px;">{{$benificiarie->full_name}}</td>
                    

                        <td>
                       <form action="#" method="post">
                            @csrf 
                            @method('delete')
                            <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                            <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                        </form> 
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('script')
  <!-- JS Libraies -->
  <script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('js/page/modules-datatables.js')}}"></script>
@endpush
