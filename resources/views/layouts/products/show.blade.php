@extends('layouts.app')

@section('content')
<div class="container" id="product">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {!! $product->html !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    {{ $product->js }}
</script>
<style type="text/css">
    {!!  $product->css !!}
</style>
@endsection
