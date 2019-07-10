function llenarCategorias(){
    $.ajax({
        url: 'index.php?controller=categorias&action=getCategorias',
        type: "GET",
        dataType: 'application/json; charset=utf-8',
        success: function (data) {
            var cat=JSON.parse(data.responseText);
            var categorias=cat.map((c)=>`<option value="${c.id}">${c.nombre}<li>`)
            alert(categorias);  
        },
        error: function(data){
            var cat=JSON.parse(data.responseText);
            var categorias=cat.map((c)=>`<option value="${c.id}">${c.nombre}<li>`);
            var options=categorias.toString();
            var stringOptions=options.replace(",", " ");
            var selectCat=`${stringOptions}`;
            $('.categorias').append(selectCat);
        }
    });
}