@extends('layout')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Tipo de gráfica
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('admin.reportes.index', 'date1='.$date1.'&date2='.$date2.'&date3='.$date3.'&date4='.$date4.'&date5='.$date5.'&date6='.$date6.'&chart=bars') }}">Barras</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('admin.reportes.index', 'date1='.$date1.'&date2='.$date2.'&date3='.$date3.'&date4='.$date4.'&date5='.$date5.'&date6='.$date6.'&chart=lines') }}">Líneas</a></li>
      </ul>
    </div>

    @include('queries.sections.pdfExport')

    <div class="content-wrapper">

    @include('queries.sections.header')

	@include('reportes.chartsFlores.'.$chart)

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
			  <tr>
			    <th>Año/Mes-Día</th>
			    @foreach ($repo as $rep)
			        <th>{{ substr ( $rep[0]->fecha ,5, 10 )  }}</th>
			    @endforeach
			  </tr>
			</thead>
			<tbody>
				@for ($i = 0; $i < 10; $i++)
				  <tr>
					<td>{{ substr ( $repo[0][$i]->fecha ,0, 4 )  }}</td>
					@foreach ($repo as $rep)
				        <td>{{ $rep[$i]->total }}</td>
				    @endforeach
				  </tr>
			    @endfor
			</tbody>
		</table>
	</div>
	@include('queries.sections.footer')
	</div>

</div>


@endsection