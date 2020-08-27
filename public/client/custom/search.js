
//productName
$(document).on("keyup",".search_key",function(){
    var api=getUrl();
    var vv=$(this);
    var key=$(this).val();

    const method="POST";
    const url=api+"search";
    const data={
        query:key
    };
    //   $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    ajaxSetup(function(data)
    {
        $(vv).autocomplete({
            source: data,
            select: function(e, ui) {
                //alert(ui.item.id);
                var id=ui.item.id;
                window.location=api+"product/details/"+id+"/1";
            }
        });

    },method,url,data);
   
    
});

$(document).ready(function(){
  $('#dropDown1').click(function(){
    $('.drop-down').toggleClass('drop-down--active');
  });
});

$(document).ready(function(){
  $('#dropDown2').click(function(){
    $('.drop-down').toggleClass('drop-down--active');
  });
});

