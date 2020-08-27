function product_price_filter(v){
    
    let start =$("#start").val();
    let end=$("#end").val();
    let brand_id=$("#brand_id").val();
     var api=getUrl();
    // alert('hello world')
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $.ajax({
		type: 'GET',
		//dataType: 'json',
		url: api+"product-price-filter",
		data: {start: start, end:end,brand_id:brand_id},
		success: function (data) {
		    $(".productData").html(data);
		  //console.log(data)
		}
        
    })
    
}

function category_product_price_filter(v){
    
    let start =$("#start").val();
    let end=$("#end").val();
    let category_id=$("#category_id").val();
     var api=getUrl();
    // alert('hello world')
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $.ajax({
		type: 'GET',
		//dataType: 'json',
		url: api+"category-product-price-filter",
		data: {start: start, end:end,category_id:category_id},
		success: function (data) {
		    $(".productData").html(data);
		  //console.log(data)
		}
        
    })
    
}