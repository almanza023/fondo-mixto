<table class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Motivo</th>
            <th>Fecha</th>            
        </tr>
    </thead>
    <tbody>

        @forelse ($solicitud->clausuras as $c)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$c->motivo}}</td>
            <td>{{$c->fecha}}</td>
           
        </tr>
        @empty
            <tr><td colspan="3"><center>No existen datos</center></td></tr>
        @endforelse      
    </tbody>
</table>

