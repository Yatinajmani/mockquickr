@extends('master')

@section('main')
@parent
            <div class="categories">
                <div class="container">
                    @foreach($categories as $category)
                    <div class="col-md-2 focus-grid">
                        <a href="{{ route('cat_ads',[$category->name]) }}">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-{{ $category->name }}"></i></div>
                                    <h4 class="clrchg" style="text-transform: capitalize; ">{{ $category->name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach

     </div>
            </div>
@endsection