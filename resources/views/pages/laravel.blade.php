@extends('layouts.master')


@section('content')
{{-- <h2>Laravel</h2>
{{$khoahoc}} --}}
@if($khoahoc != "")
{{$khoahoc}}
@else
{{"Không có khoahoc"}}
@endif
<br>

@for($i=1; $i<=10; $i++)
{{$i." "}}
@endfor
@endsection