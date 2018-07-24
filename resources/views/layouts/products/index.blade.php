@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="container" id="products">
	<form class="bs-example bs-example-form" data-example-id="input-group-with-button"> 
		<div class="row"> 
			<div class="col-lg-6"> 
				<div class="input-group"> 
					<input name="q" class="form-control" placeholder="Search for..." value="{{ request('q') }}"> 
					<div class="btn-group" role="group" aria-label="Basic example">
					  <button type="submit" class="btn btn-default fa fa-search"></button>
					  <button type="button" onclick="this.form.q.value='';this.form.submit();return false;" class="btn btn-default fa fa-close"></button>
					</div> 
				</div> 
			</div> 
		</div> 
	</form>
    <div class="row justify-content-center">
        <div class="col-md-12">
        	@if(!count($products))
				<div class="alert alert-warning mt-2">No product found.</div>
        	@endif
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4 product-item">
                    <div class="card" data-content="{{ $product->html }}">
                    	<a class="btn fa fa-trash-o delete-product" data-id="{{ $product->id }}"href="javascript:void(0)" title="Delete Product"></a>
                    	<a class="btn fa fa-edit edit-product" href="/products/edit/{{ $product->id }}" title="Edit Product"></a>
                        <a class="prod-img-link" href="/products/show/{{ $product->id }}">
                        	<img class="card-img-top" src="/images/placeholder.png" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <a href="/products/show/{{ $product->id }}">
                                <p class="card-title"></p>
                            </a>
                            <p class="card-text"></p>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
	<?php echo $products->render(); ?>
</div>
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
    //jQuery(document).ready(function($){
        $('.card').each(function(index, elem){
            var content = $(this).data('content');
            var img = $(content).find('img').attr('src');
            $(this).find('.card-img-top').attr('src', img);
            var texts = [];
			$(content).find('*').contents().filter((index, elem) => { 
			    if(elem.nodeType === 3 && $.trim(elem.nodeValue) !== ''){
			        texts.push(elem.nodeValue.valueOf());
			    }
			});
            $(this).find('.card-title').html(texts.shift());
            $(this).find('.card-text').html(texts.join(' '));//.substring(0,100)
        });
    //});
 });
</script>
<style type="text/css">
    #products .card-body {
        text-align: left;
    }

    #products .card {
        text-align: center;
        display: block;
        padding: 10px;
    }

    #products img.card-img-top {
        max-width: 100px;
	    float: none;
	    display: inline-block;
	    width: 100px;
    }
   #products  .col-md-4 {
        margin-top: 10px;
    }
    #products .card:hover {
        box-shadow: 0px 2px 5px 1px #888888;
    }
	#products .product-item .fa{
	    position: absolute;
	    display: none;
	}
	#products .edit-product {
	    right: 15px;
	}

	#products .delete-product {
	    right: 45px;
	    top: 9px;
	}
	#products p.card-text {
	    max-height: 185px;
	    overflow: hidden;
	    display: block;
	    display: -webkit-box;
	    margin: 0 auto;
	    line-height: 1.4;
	    -webkit-line-clamp: 3;
	    -webkit-box-orient: vertical;
	    text-overflow: ellipsis;
	}
	#products .prod-img-link{
        min-height: 200px;
    	display: inline-block;
	}
	#products ul.pagination {
	    margin-top: 10px;
	    float: right;
	}
	#products button.btn.btn-default{
		z-index: 2;
		margin-left: -1px;
		border-top-left-radius: 0;
		border-bottom-left-radius: 0;
		color: #333;
		background-color: #fff;
		border-color: #ccc;
	}
	#products .product-item:hover .fa {
	    display: initial;
	}
</style>
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
	jQuery(document).on('click', '.delete-product', function(e){
		if(confirm('Are you sure to delete this product?')){
			$('#products a.btn').addClass('disabled');
			var productId = $(this).data('id');
			if(productId){
				var that = this;
				axios.get('/products/delete/' + productId).then(response => {
					$(that).parents('.col-md-4').remove();
					toastr.success('Product deleted successfully!!.', '', {
						onHidden : function() { 
							window.location.reload(); 
						},
						timeOut: 1000
					})
				});
			}
		}
	});
});
</script>
@endsection
