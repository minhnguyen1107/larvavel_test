@extends('layouts.master')

@section('content')
    <h2>PHP</h2>
    {{$khoahoc}}
    {!!$khoahoc!!}

    {{-- Comment trên laravel --}}
    <?php $khoahoc1 = array('PHP', 'JS') ?>
    <br>
    {{-- @if(!empty($khoahoc1))
        @foreach ($khoahoc1 as $value)
        {{$value}}
            
    @endforeach
    @else
        {{"Mảng rỗng"}}
    @endif --}}
    @forelse ($khoahoc1 as $value)
    @break($value == "JS")
        {{$value}}
    @empty
        {{"mảng rỗng"}}
        
    @endforelse
@endsection