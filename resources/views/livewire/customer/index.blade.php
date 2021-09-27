<div class="container" wire:poll.2s><!--Sondeo para renderizar el componente cada 5 segundos-->
    <br>
    <div class="container-fluid">
      <div class="row justify-content-center">
        @if(count($customers_queue) > 0)
            @foreach ($customers_queue as $queues)
              {{-- expr --}}
                  @if ($queues->queue[0]->id == 1)
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                        <div class="card-body">{{ $queues->name }}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Cola 1</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                  @else
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">{{ $queues->name }}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">Cola 2</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                  @endif
            @endforeach
        @else
        <div class="card mb-4"style="background: #6c63ff;" >
            <div class="card-body text-white">
                No tiene clientes en cola.
            </div>
        </div>
        @endif
      </div>
        
    </div>


    <div class="card mb-4">
        <div class="card-body">
        @include('livewire.customer.modal')
        @include('livewire.customer.create')
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-6">
                <h4>Listado de Clientes</h4>
                <span>Todos los clientes registrados en el sistema.</span>
            </div>
            <div class="col-lg-6 col-md-6">
                  <a title="Registrar Usuario" data-toggle="modal" data-target="#createModal" class="btn btn-secondary text-white float-right" style="background: #6c63ff;">Registrar cliente</a>
            </div>
        </div> <br><br>
            <div class="table-responsive">
                <table class="table" width="100%" cellspacing="0">
                    {{-- id="dataTable" --}}
                      <thead class="text-center">
                        <tr>
                          <th scope="col">Id</th>
                          <th >Nombre</th>
                          <th >Status</th>
                          <th >Cola</th>
                          <th >Tiempo</th>
                          <th >Accición</th>
                        </tr>
                      </thead>
                      @foreach($customers as $customer)
                      <tbody class="text-center">
                        <tr>
                          <th>{{ $customer->id }}</th>
                          <td>{{ $customer->name }}</td>
                          @if($customer->status == true)
                              <td style="background-color: #28a745; color: white;"><label><em><b>Atendido.</b></em></label></td>
                          @else
                              <td style="background-color: #dc3545; color: white;"><label><em><b>En proceso.</b></em></label></td>
                          @endif
                          <td><label><em><b>{{ $customer->queue[0]->name }}.</b></em></label></td>
                          <td><label><em><b>{{ $customer->queue[0]->time }} Min.</b></em></label></td>

                          <td>
                              <button title="Eliminar cliente" type="button" data-toggle="modal" data-target="#destroyModal" wire:click="modal({{ $customer->id }})" class="btn btn-danger text-white mr-2 text-capitalize" >Eliminar</button>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                </table>
                {{ $customers->links() }}
            </div>
        </div>
    </div>
                @if($customers->count() == 0)
                    <div class="card">
                        <div class="card-body">
                            No tiene clientes registrados.
                        </div>
                    </div>
                @endif
</div>
