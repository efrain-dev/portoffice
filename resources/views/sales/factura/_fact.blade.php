<table class="table table-hover">

    <tbody>
    <tr>
        <th>
            <div class="">
                <img src="{{ url('/img/icono.png') }}" style="height: 50px; width: auto;" alt="">
                <p>Libreria del puerto</p>
            </div>
        </th>
        <td>
            <p><strong>Email: </strong> portficce@gmail.com</p>
            <p><strong>Telefono: </strong> 58221619</p>
            <p><strong>Pagina Web </strong> <a href="portoffice.com"> portoffice.com</a></p>
        </td>
        <td>
            <p><strong>Port Oficce</strong></p>
            <p><strong>Direccion: </strong> Puerto Barrios Izabal</p>
            <p>Puerto Barrios, Izabal</p>
        </td>
    </tr>
    <tr>
        <th>
            <h5>Detalle del cliente</h5><hr>
            <p>{{$sales->name}}</p>
            <p>{{$sales->address}}</p>
        </th>
        <th>

        </th>
        <td>
            <h5>Detalle de la Factura</h5><hr>
            <p><strong>No. Fac &nbsp;</strong>{{$sales->id}}</p>
            <p>{{$sales->created_at->format('M d Y')}}</p>
        </td>

    </tr>
    </tbody>

</table>
<hr>


<table class="table table-hover">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    @forelse($details as $item)
        <tr>
            <th scope="row">{{$item->id_sales}}</th>
            <td>{{$item->product['name']}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->subtotal}}</td>
        </tr>
    @empty

    @endforelse
    <tr>
        <th scope="row"></th>
        <td></td>
        <td> Neto</td>
        <td>0.0</td>
    </tr>
    <tr>
        <th scope="row"></th>
        <td></td>
        <td> Total</td>
        <td>{{$sales->total}}</td>
    </tr>
    </tbody>
    <table class="table ">
        <thead class="thead-light">
        <tr>
            <th scope="col">-----------------</th>
            <th scope="col">------------------</th>
            <th scope="col">Tax 0.0</th>
            <th scope="col">Total {{$sales->total}}</th>
        </tr>
        </thead>

    </table>
</table>
