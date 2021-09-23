<div class="container">
    <br>
    <div class="card mb-4">
        <div class="card-body">
        {{-- @include('livewire.user.modal') --}}
        @include('livewire.customer.create')
        {{-- @include('livewire.user.edit') --}}
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-6">
                <h4>Listado de Clientes</h4>
                <span>Todos los clientes registrados en el sistema</span>
            </div>
            <div class="col-lg-6 col-md-6">
                {{-- <div class="btn-toolbar justify-content-between float-right" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="input-group">
                    <div class="input-group-prepend"> --}}
                          {{-- <input title="Buscar por Nombre" wire:model="filter.user_name" type="text" class="form-control mx-1" name="keyWord" id="keyWord" placeholder="Nombre">
                          <input title="Buscar por Email" wire:model="filter.user_email" type="text" class="form-control mx-1" name="keyWord" id="keyWord" placeholder="Email">
                          <input title="Buscar por Roles" wire:model="filter.user_name_roles" type="text" class="form-control mx-1" name="keyWord" id="keyWord" placeholder="Roles"> --}}
                          {{-- @can('create', Auth::user()) --}}
                            <a title="Registrar Usuario" data-toggle="modal" data-target="#createModal" class="btn btn-secondary text-white float-right" style="background: #6c63ff;">Registrar cliente</a>
                          {{-- @endcan --}}
                    {{-- </div>
                  </div>
                </div> --}}
            </div>
        </div> <br><br>
            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    {{-- id="dataTable" --}}
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th >Nombre</th>
                          <th >Apellido</th>
                          <th >Email</th>
                          <th >Rol</th>
                          {{-- @can('create', Auth::user())
                          <th class="text-center">Accición</th>
                          @endcan --}}
                        </tr>
                      </thead>
                      {{-- @foreach($users as $user) --}}
                      <tbody>
                        <tr>
                          {{-- <th>{{ $user->id }}</th>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->last_name }}</td>
                          <td>{{ $user->email }}</td> --}}
                          {{-- @if(!empty($user->roles[0]))
                              <td><label><em><b>{{ $user->roles[0]->name }}.</b></em></label></td>
                          @else
                              <td><label><em><b>No aplica.</b></em></label></td>
                          @endif --}}
                          <td class="text-center">


                            {{-- @can('update', Auth::user())
                                <a title="Editar Usuario" data-toggle="modal" data-target="#updateModal" wire:click="modal('edit',{{ $user->id }})">
                                    <button class="btn pt-0" style="background: white;"><i class="fas fa-edit" style="font-size: 20px;"></i></button>
                                </a>
                            @endcan --}}
    {{--
                            @can('delete', Auth::user())
                                <button title="Eliminar Usuario" type="button" class="btn pt-0" data-toggle="modal" data-target="#destroyModal" wire:click="modal('destroy',{{ $user->id }})"
                                        class="btn btn-danger text-white mr-2 text-capitalize"
                                        style="background: white">
                                        <i class="fas fa-trash-alt" style="font-size: 20px; color: red"></i>
                                </button>
                            @endcan --}}

                          </td>
                        </tr>
                      </tbody>
                      {{-- @endforeach --}}
                </table>
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>
    {{--             @if($users->count() == 0)
        <div class="card">
            <div class="card-body">
                No tiene usuarios registrados.
            </div>
        </div>
    @endif --}}
</div>
