@extends('web.backend.admin.layout.layout')
@push('ccs')
  <!-- CSS Libraries -->
<link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endpush

@section('content')

<<<<<<< HEAD
<div >
    <a href="{{route('benificiary.create')}}" class="btn btn-icon btn-lg btn-success" >add</a>
 </div><br/>
<div class="card"  style="box-shadow: 3px 3px 3px 3px rgba(0,0,0, 0.2)">
    <div class="card-header">
        Lista de Beneficiários
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped v_center" id="table-2">
                <thead>
                    <tr style="box-shadow: 1px 1px 1px 1px rgba(0,0,0, 0.1)">
                    <th>uuid</th>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Data de Nascimento</th>
                    <th>Bairro</th>
                    <th>Telefone</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($genres as $genre)
                   <tr>
                        <td class="text-truncate" style="max-width:50px;">{{$genre->uuid}}</td>
                        <td class="text-truncate" style="max-width:50px;">{{$genre->name}}</td>
                        <td>{{$genre->created_at}}</td>
                        <td>{{$genre->updated_at}}</td>
                        <td>{{$genre->deleted_at}}</td>
                        <td>
                       <form action="{{route('genre.destroy',$genre->uuid)}}" method="post">
                            @csrf 
                            @method('delete')
                            <a href="{{route('genre.edit',$genre->uuid)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                            <a href="{{route('genre.show',$genre->uuid)}}" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                            <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                       
                        </form> 
                        </td>
                        </tr>
                    @endforeach
                  --}}
                </tbody>
            </table>
        </div>
=======

    <div class="table-responsive">
        <table class="table table-striped v_center" id="table-2">
            <thead>
                <tr style="box-shadow: 1px 1px 1px 1px rgba(0,0,0, 0.1)">
                <th>uuid</th>
                <th>Nome Completo</th>
               <th>Num de Visita </th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Data de Servico</th>
                <th>Enca do Domicilar</th>
                <th>Pro da Visita </th>
                <th>Data Recepicao</th>
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($benificiaries as $benificiary)
                <tr>
                    <td>{{$benificiary->uuid}}</td>
                    <td class="align-middle">{{$benificiary->full_name}}</td>
                    <td class=>{{$benificiary->number_of_visits}}</td>
                    <td class=>{{$benificiary->birth_date}}</td>
                    <td class=>{{$benificiary->phone}}</td>
                    <td class=>{{$benificiary->service_date}}</td>
                    <td class=>{{$benificiary->purpose_of_visit_uuid}}</td>
                    <td class=>{{$benificiary->date_received}}</td>
                    <td class=>{{$benificiary->status}}</td>
                    <td class=>{{$benificiary->number_of_visits}}</td>



                        <td>
                   <form action="{{route('benificiary.destroy',$benificiary->uuid)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('benificiaries.edit',$benificiary->uuid)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                        <a href="{{route('benificiary.show',$benificiary->uuid)}}" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                        <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                    </form>
                     </td>
                    </tr>
                @endforeach




            </tbody>
        </table>
>>>>>>> a2bbecefdef7dd921ec75eb09adf64f53a33031a
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

