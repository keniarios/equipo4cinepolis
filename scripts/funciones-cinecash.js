$(window).load(function () {
    function FormatoTransaccion(t) {
            var row = document.createElement('div'),
                            descripcion, tipo, accion;
            $(row).addClass("todas");
            $(row).addClass("row");
            switch (t.Tipo) {
                case "Transferencia":
                    descripcion = "Recarga con tarjeta bancaria: " + t.Tarjeta + ". Fecha de expiración: " + t.FechaExpiracion;
                    tipo = "recargas";
                    accion = "Transferencia";
                    break;
                case "Transferencia PayPal":
                    descripcion = "Recarga con PayPal. Fecha de expiración: " + t.FechaExpiracion;
                    tipo = "recargas";
                    accion = "Transferencia";
                    break;
                case "Compra":
                    descripcion = "Película: " + t.Pelicula +
                                ". Número de boletos: " + t.CantidadTickets +
                                ". Complejo: " + t.Complejo +
                                ". Num. Transacción: " + t.TransaccionID +
                                ". Clave de rastreo: " + t.CodigoConfirmacion;
                    tipo = "compras";
                    accion = "Compra";
                    break;
                case "Recarga":
                    descripcion = "CineCash®/CineCard®: " + t.Tarjeta + ". Fecha de expiración: " + t.FechaExpiracion;
                    tipo = "recargas";
                    accion = "Recarga";
                    break;
                case "TransferenciaEnvio":
                    if (t.CinepolisIDRecibe.length > 25){
                        var sbsMail = [t.CinepolisIDRecibe.substring(0, 25), t.CinepolisIDRecibe.substring(25, 50), t.CinepolisIDRecibe.substring(50, 75)];
                        t.CinepolisIDRecibe = "";
                        sbsMail.forEach(function (element, index, array)
                        {
                            t.CinepolisIDRecibe += element + " ";
                        });
                    }
                    descripcion = "Créditos para: " + t.CinepolisIDRecibe + ". Clave de rastreo: " + t.CodigoConfirmacion + " Fecha de expiración: " + t.FechaExpiracion;
                    accion = "Transferencia";
                    tipo = "compras";
                    break;
                case "TransferenciaRecibe":
                    if (t.CinepolisIDEnvia.length > 25) {
                        var sbsMail = [t.CinepolisIDEnvia.substring(0, 25), t.CinepolisIDEnvia.substring(25, 50), t.CinepolisIDEnvia.substring(50, 75)];
                        t.CinepolisIDEnvia = "";
                        sbsMail.forEach(function (element, index, array) {
                            t.CinepolisIDEnvia += element + " ";
                        });
                    }
                    descripcion = "Monto: " + t.Cantidad + " de parte de: " + t.CinepolisIDEnvia + ". Clave de rastreo: " + t.CodigoConfirmacion + " Fecha de expiración: " + t.FechaExpiracion;
                    accion = "Transferencia";
                    tipo = "recargas";
                    break;
            }
            $(row).addClass(tipo);
            row.innerHTML = Core.Template.Row.replace("{Accion}", accion).replace("{Fecha}", t.Fecha).replace("{Cantidad}", t.Cantidad).replace("{Descripcion}", descripcion);
            return row;
    }
    function Cargar(o) {
        var container = document.createElement('div'),
            t = o.lstTransacciones;
        if (t.length > 0) {
            for (var i = 0; i < t.length; i++) {
                container.appendChild(FormatoTransaccion(t[i]));
            }
            $(".contenedorUltimosMovimientos").html(Core.Template.Header + '<div class="desc-mov">' + container.innerHTML + '</div>');
            //Inicializa grupos a las filas
            $('.desc-mov div.row').each(function () {
                var groups = ['todas'];
                if ($(this).hasClass('compras'))
                    groups.push('compras');
                else
                    groups.push('recargas');
                $(this).data('groups', JSON.stringify(groups));
            });
            var $container = $('.desc-mov');
            $container.shuffle({
                itemSelector: 'div.row'
                //columnWidth: 116,
                //gutterWidth: 18,
                //opacity: 0.4
            });
            $('.menu-mov').on('click', 'a', function (e) {
                e.preventDefault();
                $('.menu-mov a').removeClass('active');
                $(this).addClass('active');

                var groupName = $(this).data('group');

                $container.shuffle('shuffle', function ($elem, shuffle) {
                    var arr = JSON.parse($elem.data('groups'));
                    return $.inArray(groupName, arr) !== -1;
                });
            });
            if (o.PaginaMaxima > 1) {
                var a = document.createElement("a"), cont = document.createElement("div");
                $(a).addClass("ver-mas")
                a.innerText = "Ver más";
                $(a).data("paginaMaxima", o.PaginaMaxima).data("paginaActual", 1);
                cont.appendChild(a);
                $(".contenedorUltimosMovimientos")[0].appendChild(cont);
            }
        }
        else {
            $('#secTransacciones').fadeIn();
        }
        sessionStorage.s$h = JSON.stringify(o);
        $('#loaderMovimientos').remove();
        $('#movimientos-cont').attr('style', 'opacity:1');
    };
    $('#loader').removeClass('loading');

    $('.tarjeta').keydown(function (event) {
        return validaSoloNumeros(event)
    });
    $('.btn-id .consultar').click(function (e) {
        e.preventDefault();
        if (Page_IsValid) {
            $('#loader').addClass('loading');
        }
    });
    $(".contenedorUltimosMovimientos").on("click", ".ver-mas", function (e) {
        e.preventDefault();
        var paginaActual = $(this).data("paginaActual"),
            paginaMaxima = $(this).data("paginaMaxima"),
            that = this;
        if (paginaActual < paginaMaxima) {
            $(this).data("paginaActual", ++paginaActual);
            $(this).parent().addClass('loading');
            Core.Async.Movimientos(paginaActual, function (o) {
                var t = o.lstTransacciones;
                if (t.length > 0) {
                    var items = [], $grid = $('.desc-mov'), frag = document.createDocumentFragment(), $items, row, groups;
                    for (var i = 0; i < t.length; i++) {
                        row = FormatoTransaccion(t[i]);
                        items.push( row);
                        frag.appendChild(row);
                        groups = ['todas'];
                        if ($(row).hasClass('compras'))
                            groups.push('compras');
                        else
                            groups.push('recargas');
                        $(row).data('groups', JSON.stringify(groups));
                    }
                    $grid[0].appendChild(frag);
                    $items = $(items);
                    $grid.shuffle('appended', $items);
                    $(that).parent().removeClass('loading');
                }
                else {
                    //alert("Ocurrió un problema al obtener tus últimos movimientos.");
                    $(this).hide();
                }
            }, function (e) {
                //alert("Ocurrió un problema al obtener tus últimos movimientos.");
                $('#secTransacciones').fadeIn();
                $('#loaderMovimientos').remove();
                $('#movimientos-cont').attr('style', 'opacity:1');
            });
        } else {
            $(this).hide();
        }
    });

    $('#recargaCinecash').click(function() {
        $.ajax({
            type: "POST",
            url: "cinecash.aspx/PurchaseCinecash",
            data: "{ }",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                var response = JSON.parse(msg.d);
                if (response.status === "ok") {
                    location.href = response.message;
                } else if(response.status === "alert") {
                    jsUtil.fancyAlert(response.message,"Aceptar");
                }
            },
            error: function (xhr) {
            }
        });
    });
   


    if (ActualizarCineCash) {
        Core.Async.Movimientos(1, Cargar, function (e) {
            //alert("Ocurrió un problema al obtener tus últimos movimientos.");
        });
    }
    else {
        if (sessionStorage.s$h) {
            Cargar(JSON.parse(sessionStorage.s$h));
        }
        else {
            Core.Async.Movimientos(1, Cargar, function (e) {
                //alert("Ocurrió un problema al obtener tus últimos movimientos.");
            });
        }
    }
    
});
