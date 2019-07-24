(function($) {
  "use strict"; // Start of use strict
  // Configure tooltips for collapsed side navigation
  $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
    template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
  })
  // Toggle the side navigation
  $("#sidenavToggler").click(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");
    $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
    $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
  });
  // Force the toggled class to be removed when a collapsible nav link is clicked
  $(".navbar-sidenav .nav-link-collapse").click(function(e) {
    e.preventDefault();
    $("body").removeClass("sidenav-toggled");
  });
  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
    var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  });
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  // Configure tooltips globally
  $('[data-toggle="tooltip"]').tooltip()
  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });
  $('.nopadre').change(function(){
      if($(this).prop('checked')){
          $('.selectUser, .dropdown-toggle').prop('disabled', 'disabled');
          $(this).prop('name', 'id_user');
      }else{
          $('.selectUser, .dropdown-toggle').removeAttr('disabled');
          $(this).removeAttr('name');
      }
  });
  $('.all').on('click', function(e){
     if($(this).is(':checked')){
         $('.selectCom, .selectValor').prop('checked', true); 
     }else{
         $('.selectCom, .selectValor').prop('checked', false); 
     }
      
  });
  $('#dataTable tbody').on('click','tr', function(e){
      if($('td:eq(6) input', this).is(':checked')){
          $('td:eq(3) input', this).prop('checked', true);
      }else{
          $('td:eq(3) input', this).prop('checked', false);
      }
  });
  $('#dataTable').dataTable( {
 
        "language": {
 
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
 
        },
      "order":[6, 'desc']
 
    } );
    $('#dataTablePag').dataTable( {

        "language": {

            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

        },
        "order":[6,'desc']
        

    } );
    $('#dataTableUser').dataTable( {

        "language": {

            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

        },
        "order":[0, 'desc']

    } );
 
        
    $('#dataTable tbody tr').each(function(e, index){
        var estado=$.trim($('td', index).eq(5).text());
        if(estado=='Solicitada'){
            $(this).css({background:'#fff3cd'});
        }else{
            $(this).css({background:'#8fe0a2'});
        }
    });
    $('#dataTable .tbodySol tr').each(function(e, index){
        var estado=$.trim($('td', index).eq(6).text());
        if(estado=='Pendiente'){
            $(this).css({background:'#f5c0c0'});
        }else{
            $(this).css({background:'#8fe0a2'});
        }
    });
    $('#dataTablePag .tbodyPag tr').each(function(e, index){
        var estado=$.trim($('td', index).eq(6).text());

        if(estado=='Pendiente'){
            $(this).css({background:'#f5c0c0'});
        }else{
            $(this).css({background:'#8fe0a2'});
        }
    });
    $('.cr').click(function(){
        if($(this).siblings('input').is(':checked')){
            $(this).siblings('input').val(11);
        }else{
             $(this).siblings('input').val(1);
        }
        
    });
        
    
    $('').click(function(){
        $(this).toggleClass("col-sm-10");
        if($(this).hasClass("col-sm-10")){
           $('.fa-arrows-alt').fadeOut(0);
           $('.fa-compress').fadeIn(0);
           $('.contred').fadeOut(0);
           $(this).fadeIn(0);
        }else{
           $('.contred').fadeIn(0);
           $('.fa-arrows-alt').fadeIn(0);
           $('.fa-compress').fadeOut(0); 
            
        }
        
    });
    //cambio de estado de la membresia
    /*$('.changeEstado').click(function(){
        var id=$(this).val();
        if($(this).is('checked')){
            var estado=1;
            $(this).attr('checked');
        }else{
            var estado=0;
            $(this).removeAttr('checked');
            
        }
        $.ajax({       
        type: 'POST',
        url: '?controller=Cartillas&action=cambioEstado',
        data: {
                'id':id,
                'estado':estado
        },
        dataType: 'html',
        error: function(){
          alert('error petición ajax');
        },
        success:function(data){
           
            $('.mensEstado').html(data);
        }
      }); 
    });*/
    /* vaciar carrito de compra*/
    $('.vaciarCart').on('click', function(){
        $.ajax({
            type: "POST",
            url: "index.php?controller=main&action=deleteCart",
            data: false,
            cache:false,
            beforesend: function(){

            },
            error: function () {
                alert("error petición ajax");
            },
            success: function (res) {
                var vacio =`
                <section class="empty-cart">
                    <i class="fa fa-shopping-cart fa-5x"></i>
                    <p class="title bold-text">
                        Carro de compras vacío.</p>

                    <p>
                            <a class="btn btn-link" href="index.php?controller=Main&action=showCategorias" >Ver productos </a></p>
                        <div class="pt-15 more-ac">
                        <a href="index.php" rel="nofollow" class="btn btn-light withBtnComprar">Volver al Home</a>
                    </div>
                </section>
                `; 
                $('.cartItem').html(vacio);
                $('.number').text('0');
            }
        });
    })
    /*Controles carro de compras*/
    function cotrolesCarro(dato,e,control,valor){
        var id = $(e).data(dato);
        var id_cartilla=$(e).data('id_cartilla');
        $.ajax({
            type: "POST",
            url: "index.php?controller=main&action=addCart",
            data: {
                'id':id,
                'id_cartilla':id_cartilla,
                'valor':valor,
                'control': control
            },
            cache:false,
            beforesend: function(){

            },
            error: function () {
                alert("error petición ajax");
            },
            success: function (res) {
                if(res==0){
                    var vacio =`
                    <section class="empty-cart">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <p class="title bold-text">
                            Carro de compras vacío.</p>

                        <p>
                                <a class="btn btn-link" href="index.php?controller=Main&action=showCategorias" >Ver productos </a></p>
                            <div class="pt-15 more-ac">
                            <a href="index.php" rel="nofollow" class="btn btn-light withBtnComprar">Volver al Home</a>
                        </div>
                    </section>
                    `; 
                    $('.cartItem').html(vacio);
                    $('.number').text('0');
                }else{
                    var cat=JSON.parse(res);
                    var cant=0;
                    var totalc=0;
                    cat.map((c)=>{cant=cant+ parseInt(c.cant), totalc=totalc+parseFloat(c.total)});
                    $('.number').text(cant);
                    $('.totalCarrito').text(`$ ${totalc}`);
                    $('.total').attr('value', totalc);
                    var categorias=cat.map((c)=>`
                        <div class="item-wrap">
                                <div class="item-all">
                                    <div class="item-info info">
                                        <ul class="inline-block">
                                            <li class="img-thumbnail"><img src="view/img/${c.img}" alt="" class="imgCart"></li>
                                            
                                        </ul>
                                        <div class="nombreItem inline-block">${c.nombre}</div>
                                    </div>
                                    <div class="item-info qty">
                                        
                                        <input class="form-control input-qty" type="tel" value="${cant}" data-id="${c.id}" data-id_cartilla="${c.id_cartilla}">
                                        <div class="btns-masmenos">
                                            <div class="btn btn-default btn-up" data-id_mas="${c.id}" data-id_cartilla="${c.id_cartilla}"><i class="fa fa-plus"></i></div>
                                            <div class="btn btn-default btn-down" data-id_menos="${c.id}" data-id_cartilla="${c.id_cartilla}"><i class="fa fa-minus"></i></div>
                                        </div>
                                        <div class="deleteItem">
                                            <div class="btn btn-link btn-delete" data-id_delete="${c.id}" data-id_cartilla="${c.id_cartilla}">Eliminar</div>
                                        </div>
                                    </div>
                                    <div class="item-info precio-unitario">
                                        <p class="bold-text sizeText15">$ <span>${c.price} </span>c/u</p>
                                    </div>
                                    <div class="item-info precio-total">
                                        <p class="bold-text sizeText15">$ <span>${c.total}</span></p>
                                    </div>
                                </div>
                            </div>`);
                    var cart=categorias.toString();
                    var stringCart=cart.replace(",", " ");
                    $('.wrap-body').html(stringCart);
                }
            }
        });
    }
    $('.wrap-body').on('change','.input-qty',function(){
        var valor =$(this).val();
        cotrolesCarro('id',this,4, valor);
    });
    $('.wrap-body').on('click','.btn-up', function(){
        cotrolesCarro('id_mas',this,3, 0);
    });
    $('.wrap-body').on('click','.btn-down', function(){
        cotrolesCarro('id_menos',this,2, 0);
    });
    $('.wrap-body').on('click','.btn-delete', function(){
        cotrolesCarro('id_delete',this,1, 0);
    });
    /* Añadir al carrode compra */
    $('.addCart').on('click', function(){
        var id = $(this).data('id');
        var valor = $('.valorP').val();
        var valorneto=$(this).data('valor');
        var name = $(this).data('nombre');
        var img = $(this).data('img');
        var cantidad = $('.cantidad').val();
        var id_user=$('.id_user').val();
        var tipoUser=$(this).data('tipouser');
        var id_cartilla=$('input:radio[name=id_cartilla]:checked').val();
        var id_padre=$('input:radio[name=id_cartilla]:checked').data('id_padre');
       
        if($("input:radio[name=id_cartilla]").is(':checked')){  
            $.ajax({
                type: "POST",
                url: "index.php?controller=main&action=addCart",
                data: {
                    'id':id,
                    'valor':valor,
                    'valorneto':valorneto,
                    'nombre':name,
                    'img':img,
                    'cantidad':cantidad,
                    'tipouser':tipoUser,
                    'id_user':id_user,
                    'id_cartilla':id_cartilla,
                    'id_padre':id_padre
                },
                cache:false,
                beforesend: function(){

                },
                error: function () {
                    alert("error petición ajax");
                },
                success: function (res) {
                    var cat=JSON.parse(res);
                    var cant=0;
                    cat.map((c)=>cant=cant+ parseInt(c.cant));
                    $('.number').text(cant);
                    var producto =`
                        <div class="row">
                            <div class="col-md-1"><i class="fa fa-2x fa-check-circle-o checkAgregado checkCircle-infIcon"></i></div>
                            <div class="col-md-2">
                                <img src="view/img/${img}" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-md-5">
                                <p class="title-prod"><a href="index.php?Controller=Main&action=comprar&id=${id}">${name}</a></p>
                                <p class="cantidad-prod">Cantidad: ${cantidad}</p>
                            </div>
                            <div class="col-md-4">$ ${valor*cantidad}</div>
                        </div>
                    `; 
                    $('.add-addCart-body').html(producto);
                    $('.overlay').fadeIn();
                }
            });
        }else{  
            alert("Seleccione una membresía");  
        } 
        
    });
    /* final añadir al carro de compra */
    $('.tipo').on('change',function(){
        var valor=$(this).val();
        if(valor==0){
            $.ajax({
                url: 'index.php?controller=categorias&action=getCategoriasJson',
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
                    var selectCat=`<label for="exampleInputEstado">*Categoria</label><select class="form-control tipo"   name="categoria" id="exampleInputEstado">${stringOptions}</select>`;
                    $('.categorias').html(selectCat);
                }
            });
        }else{
            $('.categorias').html("");
        }
    });
    $('.btn-num-product-down').on('click', function(e){
        e.preventDefault();
        var numProduct = Number($(this).next().val());
        var valorp=$('.valorP').val();
        if(numProduct > 1) {
            $(this).next().val(numProduct - 1);
            var valor=valorp*(numProduct-1);
            $(".valorProducto").text(valor);
        }
    });

    $('.btn-num-product-up').on('click', function(e){
        e.preventDefault();
        var numProduct = Number($(this).prev().val());
        var valorp=$('.valorP').val();
        $(this).prev().val(numProduct + 1);
        var valor=valorp*(numProduct+1);
        $(".valorProducto").text(valor);
    });
    $('.buscarUsuario').focusout(function(){
        var user=$(this).val();
        var form=$('.formularioUser').html()
         $.ajax({       
        type: 'POST',
        url: '?controller=Usuarios&action=buscarUser',
        data: {
                'user':user
        },
        dataType: 'html',
        error: function(){
          alert('error petición ajax');
        },
        success:function(data){
            if(data==0){
                $('.userExistente').remove();
                $('.formularioUser').fadeIn();
            }else{
                $('.formularioUser').fadeOut();
                $('.iduser').html(data);
            }
        }
      }); 
    });
    $('.buscarUsuario').focusout(function(){
        var user=$(this).val();
        var form=$('.formularioUser').html()
         $.ajax({       
        type: 'POST',
        url: '?controller=Usuarios&action=buscarUser',
        data: {
                'user':user
        },
        dataType: 'html',
        error: function(){
          alert('error petición ajax');
        },
        success:function(data){
            if(data==0){
                $('.userExistente').remove();
                $('.formularioUser').fadeIn();
            }else{
                $('.formularioUser').fadeOut();
                $('.iduser').html(data);
            }
        }
      }); 
    });
    $('.verificarUser').focusout(function(){
        var user=$(this).val();
         $.ajax({       
        type: 'POST',
        url: '?controller=Usuarios&action=verificarUser',
        data: {
                'user':user
        },
        dataType: 'html',
        error: function(){
          alert('error petición ajax');
        },
        success:function(data){
            $('.formularioUser').html(data);
        }
      }); 
    });
    $('.buscarPadre').focusout(function(){
        var user=$(this).val();
        $.ajax({       
            type: 'POST',
            url: '?controller=Usuarios&action=buscarCartilla',
            data: {
                    'user':user
            },
            dataType: 'html',
            error: function(){
              alert('error petición ajax');
            },
            success:function(data){
                $('.iduserPadre').html(data);
            }
        }); 
        $.ajax({       
            type: 'POST',
            url: '?controller=Usuarios&action=ListarCartilla',
            data: {
                    'user':user
            },
            dataType: 'html',
            error: function(){
              alert('error petición ajax');
            },
            success:function(data){
                $('.planes').html(data);
            }
        });
    });
    $('.buscarInfoUser').focusout(function(){
        var user=$(this).val();
        $.ajax({
            type: 'POST',
            url: '?controller=Usuarios&action=buscarCartilla',
            data: {
                'user':user,
                'info':1
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.iduserPadre').html(data);
            }
        });
        $.ajax({
            type: 'POST',
            url: '?controller=Usuarios&action=ListarCartilla',
            data: {
                'user':user,
                'info':1
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.planes').html(data);
            }
        });
    });
    
    
    $('.membresia').click(function(){
        if($(this).is('checked')){
            var id=$(this).val();
            alert(id);
            $.ajax({       
            type: 'POST',
            url: '?controller=Planes&action=buscarPlanes',
            data: {
                    'id':id
            },
            dataType: 'html',
            error: function(){
              alert('error petición ajax');
            },
            success:function(data){
                $('.planes').html(data);
            }
        });
        }
    });
    $('.buscarRef').focusout(function(){
        var user=$(this).val();
         $.ajax({       
        type: 'POST',
        url: '?controller=Usuarios&action=buscarRef',
        data: {
                'user':user
                               
        },
        dataType: 'html',
        error: function(){
          alert('error petición ajax');
        },
        success:function(data){
            $('.iduserRef').html(data);
        }
      }); 
    });
    $('.buscarRef2').focusout(function(){
        var user=$(this).val();
        var objeto=$(this);
         $.ajax({       
        type: 'POST',
        url: '?controller=Usuarios&action=buscarUserCAr',
        data: {
                'user':user
                               
        },
        dataType: 'html',
        error: function(){
          alert('error petición ajax');
        },
        success:function(data){
            objeto.val(data);
        }
      }); 
    });
        if($('.id_user').length){
            var user=$('.id_user').val();
        }else{
            var user=0;
        }
        $.ajax({       
            type: 'POST',
            url: '?controller=Comisiones&action=buscar',
            data: {
                    'user':user

            },
            dataType: 'html',
            error: function(){
              alert('error petición ajax buscar notificaciones');
            },
            success:function(data){
                    var num =$.trim(data);
                    $('.solpen').text(num);
            }
        }); 
        $.ajax({       
            type: 'POST',
            url: '?controller=Usuarios&action=buscar',
            data: {
                    'user':user

            },
            dataType: 'html',
            error: function(){
              alert('error petición ajax buscar pagos');
            },
            success:function(data){

                    var num =$.trim(data);
                    $('.papen').text(num);
            }
        }); 
        
        $.ajax({       
           
            type: 'POST',
            url: '?controller=Usuarios&action=valorFondos',
            data: {
                    'user':user

            },
            dataType: 'html',
            error: function(){
              alert('error petición ajax buscar fondos');
            },
            success:function(data){
                    var num =$.trim(data);
                    $('.valor_fondos').text(num);
            }
        });
    function copiarAlPortapapeles(id_elemento) {
        var aux = document.createElement("input");
        var link = document.getElementById(id_elemento).innerHTML;
        var j = link.replace(/&amp;/g, "&");
        aux.setAttribute("value", j);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
    $('.copy').click(function(){
        var id=$(this).data('id');
        copiarAlPortapapeles('enlace'+id);
    });

})(jQuery); // End of use strict
