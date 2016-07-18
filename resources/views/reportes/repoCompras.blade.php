@extends('layout')

@section('content')


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Tipo de gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('repoCompras','chart=bars') }}">Barras</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('repoCompras','chart=lines') }}">Líneas</a></li>
      </ul>
    </div>

    @include('queries.sections.pdfExport')

    <div class="content-wrapper">

    @include('queries.sections.header')

    @include('reportes.chartsPedidos.'.$chart)


	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
			  <tr>
			    <th>Año/Mes</th>
			    @for ($i = 0; $i < 12; $i++)
			        <th>{{ substr ( $repos[0][$i]->fecha ,5, 2 )  }}</th>
			    @endfor
			  </tr>
			</thead>
			<tbody>
				@for ($i = 0; $i < 10; $i++)
				  <tr>
					<td>{{ substr ( $repos[$i][0]->fecha ,0, 4 )  }}</td>
					@for ($j = 0; $j < 12; $j++)
				        <td>{{ $repos[$i][$j]->total }}</td>
				    @endfor
				  </tr>
			    @endfor
			</tbody>
		</table>
	</div>
	@include('queries.sections.footer')
	</div>

</div>




@endsection