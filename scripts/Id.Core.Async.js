var paginaCC = 1;
var Core = {
    Utilidades: {
        DateFormat: function (date) {
            return [date.getDate(), date.getMonth() + 1, date.getFullYear()].join("/") + " " + [date.getHours() + 1, date.getMinutes() + 1, date.getSeconds() + 1].join(":");
        }
    },
    Async: {
        ClubCinepolis: function (callback, callbackerror) {
            var data = {
                url: "club-cinepolis.aspx/ObtenerTransaccionesClubCinepolis"
            };
            Core.Async.Request(data, function (response) {
                try {
                    var json = JSON.parse(response.d);
                    if (json.PaginaMaxima > 1)
                    {
                        sessionStorage.SDR34 = json.PaginaMaxima;
                        $('.VerMasClubCinepolis').show();
                    }
                        
                    callback(json.lstTransacciones, true);
                } catch (e) {
                    callbackerror(e);
                }
            }, callbackerror);
        },
        Movimientos: function (pagina, callback, callbackerror) {
            var data = {
                url: "cinecash.aspx/ObtenerTransacciones",
                data: "{pagina : '" + pagina + "'}"
            };
            Core.Async.Request(data, function (response) {
                try {
                    var json = JSON.parse(response.d);
                    callback(json);
                } catch (e) {
                    callbackerror(e);
                }
            }, callbackerror);
        },
        Request: function (data, callback, callbackerror) {
            var settings = {
                type: "POST",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (respuesta) {
                    callback(respuesta);
                },
                error: function (response) {
                    callbackerror(response);
                }
            };

            $.extend(settings, data);
            $.ajax(settings);
        },
        VerMasClubCinepolis: function (callback, callbackerror) {
            var data = {
                url: "club-cinepolis.aspx/ObtenerMasClubCinepolis",
                data: "{pagina : '" + paginaCC + "'}"
            };
            Core.Async.Request(data, function (response) {
                try {
                    var json = JSON.parse(response.d);
                    if (json.PaginaMaxima > paginaCC + 1)
                        paginaCC += 1;
                    else
                        $('.VerMasClubCinepolis').hide();

                    callback(json.lstTransacciones, false);

                } catch (e) {
                    callbackerror(e);
                }
            }, callbackerror);
        }
    },
    Template: {
        Header: "<header class=\"encabezado row\"><ul><li class=\"id-col3\">Acción</li><li class=\"id-col3\">Fecha</li><li class=\"id-col4\">Concepto</li><li class=\"id-col2\">Puntos</li></ul></header>",
        Row: "<ul><li class=\"id-col3\"> {Accion} </li><li class=\"id-col3\"> {Fecha} </li><li class=\"id-col4 toggle\"><a href=\"#\" class=\"id-icon-mas\"></a> {Descripcion} </li><li class=\"id-col2\"> {Cantidad} </li></ul>",
        RowClub: "<li class=\"row\"><div class=\"movimiento float-left\"><figure class=\"float-left\"><img src=\" {Imagen} \" alt=\"\"></figure><ul class=\"float-left\"><li> {Encabezado} </li><li> {Descripcion} </li><li> {Fecha} </li><li> {Rating} </li></ul></div><p class=\"puntos float-right\"><span> {Monto} </span> Puntos</p></li>"

    }
};