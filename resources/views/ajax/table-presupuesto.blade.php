
 <table  class="table table-hover table-sm mejoratb">
    <thead class="thead-light">
        <tr>
            <th>#</th>            
            <th>Recurso Municipio</th>
            <th>Gobernación de Sucre (Fondo Mixto)</th>
            <th>Ingreso Cultura</th>
            <th>Ingreso Propio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($solicitud->proyecto->presupuestos as $presupuesto)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>            
            <td class="text-center">${{number_format($presupuesto->recurso_municipio, 0)}}</td>
            <td class="text-center">${{number_format($presupuesto->fondo_mixto, 0)}}</td>
            <td class="text-center">${{number_format($presupuesto->ministerio_cultura, 0)}}</td>
            <td class="text-center">${{number_format($presupuesto->ingreso_propio, 0)}}</td>
         <td>
            @if(count($solicitud->clausuras)==0)
            <form class="form-del-pre" action="{{ route('delete.presupuesto', [$presupuesto->id, $solicitud->id]) }}" method="POST" style="width: 8%">
                @csrf          
                @method('DELETE')
                <button class="btn btn-danger btn-sm del-presupuesto" type="button" > X</button>

            </form>
            @endif
         </td>
            
        </tr>
        @empty
           
        @endforelse
       
</table>