function llenarCategorias(){
    $.ajax({
        url: 'index.php?controller=categorias&action=getCategoriasJson',
        type: "GET",
        dataType: 'application/json; charset=utf-8',
        success: function (data) {
            console.log(data);
            var cat=JSON.parse(data.responseText);
            var categorias=cat.map((c)=>`<option value="${c.id}">${c.nombre}</option>`)
        },
        error: function(data){
            
            var cat=JSON.parse(data.responseText);
            var categorias=cat.map((c)=>`<option value="${c.id}">${c.nombre}</option>`);
            
            var options=categorias.toString();
            
            var stringOptions=options.replace("</option>,<option ","</option><option ");
            var selectCat=`${stringOptions}`;
            $('.categorias').append(selectCat);
        }
    });
}
function closeMiniCart(){
    $('.overlay').fadeOut();
}