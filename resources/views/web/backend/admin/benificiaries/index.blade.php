@extends('web.backend.admin.layout.layout')

@section('content')
<div class="card-body">


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
    </div>
</div>
</div>

@endsection
