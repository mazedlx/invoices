@extends('layouts.app')

@section('content')
<h1 class="title">Yearly Totals</h1>
<ul>
@forelse ($totals as $year => $total)
    <li>{{ $year }}: &euro; {{ number_format($total, 2, ',', '.') }}</li>
@empty
@endforelse
</ul>
@stop
