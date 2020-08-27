
//productName
$(document).on("keyup",".brandSearchkey",function(){
    var api=getUrl();
    var vv=$(this);
    var key=$(this).val();
    
    var brand_id = $("#e").val();

    const method="POST";
    const url=api+"brand-search";
    const data={
        query:key,
        brand_id: brand_id
    };
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
