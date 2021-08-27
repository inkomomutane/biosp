@extends('web.backend.admin.layout.layout')

@section('content')

                <div class="card">
                            <div class="card-header">
                                <h4>Lista de Bairros</h4>
                            </div>
                            <div class="card-body">
                                <div class="section-title mt-0 ">
                                <td>
                                   <div class="buttons">
                                        <a href="{{route('neighborhood.create')}}"  class="btn btn-icon btn-lg btn-success">Add</i></a>
                                     </div>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">UUID</th>
                                        <th scope="col">NOME</th>
                                        <th scope="col">PROVINCIA</th>
                                        <th scope="col">CREATED_AT</th>
                                        <th scope="col">UPDATE_AT</th>
                                        <th scope="col">DELETED_AT</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="buttons">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Adicionar Provincia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <form method="post" action="#">
                        @csrf
                        

                              <div class="form-group">  
                               <input type="text" class="form-control form-control-lx" name="uuid" id="uuid" placeholder="UUID">
                              </div>

                             <div class="form-group">  
                               <input type="text" class="form-control form-control-lx" name="name" id="name"placeholder="NAME">
                              </div> 
                              
                            <div class="modal-footer bg-white br">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" >Save</button>
                            </div>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
@endsection
