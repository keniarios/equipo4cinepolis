(function() {
  'use strinct';

  var path = '//static.cinepolis.com/cortinillas/1/cortinilla-escalofrios-2';

  var Takeover = Takeover || {
    // Global prop
    _hasCookie: !(typeof ($.cookie('cortinilla')) === "undefined" || $.cookie('cortinilla') == ""),
    _isMobile: detectmob(),
    _container: $('.ps-dinamic-overlay'),
    _markup: '<link rel="stylesheet" href="'+path+'/css/master.css">\
              <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">\
              <article id="takeover" class="o-takeover anima">\
                <a href="#" id="takeover-close" class="o-takeover__close"><img src="'+path+'/imagenes/close.png" alt=""></a>\
                <div class="o-takeover__wrapper">\
                  <div class="o-takeover__inner">\
                    <a href="#" id="takeover-link" target="_black" class="o-takeover__content">\
                      <figure class="tk-monthers"><img src="'+path+'/imagenes/img-escalofrios2-monthers.png"/></figure>\
                      <div class="tk-info">\
                        <figure class="tk-characters"><img src="'+path+'/imagenes/img-escalofrios2-characters.png"/></figure>\
                        <div class="tk-copys">\
                          <figure class="tk-copys-title"><img src="'+path+'/imagenes/img-escalofrios2-title.png"/></figure>\
                          <p>Gran estreno</p>\
                          <p>Compra aquí tus boletos</p>\
                        </div>\
                      </div>\
                      <p class="tk-legales">GOOSEBUMPS™ Scholastic. Movie ©2018 CPII. All Rights Reserved.</p>\
                    </a>\
                  </div>\
                </div>\
              </article>',

    // Global Methods
    create: function () {
      // If Cookie and Mobile True stop module
      if (this._hasCookie || this._isMobile) { return false; }

      // Init module
      var instance = Object.create(this);
      this.init();
      return instance;
    },

    init: function () {
      // Trigger DataLayer
      dataLayer.push({
        'event': 
          'promotionView',
          'ecommerce': {
            'promoView': {
              'promotions': [{
                'id': 'TO-Escalofríos-2-121018',                  
                'name': 'Gran estreno: Escalofríos 2 TO',
                'creative': 'TakeOver',
              }]
            }
          }
      });

      // Call primary functions
      this.render();
      this.cache();
      this.bindEvents();
      this.setCookie();

      // Custom primary functions
      this.showTakeover();
      this.autoClose();
    },

    render: function () {
      this._container.prepend(this._markup);
    },

    cache: function () {
      // Here init DOM selectors
      this.tk_obj = $('#takeover');
      this.tk_link = $('#takeover-link');
      this.tk_close = $('#takeover-close');
    },

    bindEvents: function () {
      // Here init event listeners
      this.tk_close.on('click', function () {
        this.closeTakeover();
      }.bind(this));

      this.tk_link.on('click', function (){
        dataLayer.push({
          'event': 
            'promotionClick',
            'ecommerce': {
              'promoClick': {
                'promotions': [{
                  'id': 'TO-Escalofríos-2-121018',                  
                  'name': 'Gran estreno: Escalofríos 2 TO',
                  'creative': 'TakeOver',
                }]
              }
            }
        });
        $(this).attr('href', 'https://goo.gl/kbNrNo');
      });
    },

    showTakeover: function () {
      // Here init animations and show takeover
      this.tk_obj.delay(600).fadeIn(600);
    },

    closeTakeover: function () {
      this.tk_obj.fadeOut(600);
      window.clearTimeout(this.timeout);
    },

    autoClose: function () {
      this.timeout = setTimeout(function () {
        this.closeTakeover();
      }.bind(this), 1000 * 11);
    },

    setCookie: function () {
      $.cookie('cortinilla', "1", {
          expires: 1,
          path: '/'
      });
    }
  }

  // Send Module to global scope
  Takeover.create();
}());