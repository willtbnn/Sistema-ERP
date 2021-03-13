$(document).ready(function() {
    $("#jscontrolUpload").submit(function () {
        //variaveis locais
        var _dados = new FormData($this);
        var _urlphp = $(this).attr("action");
        var _seletoralert = $(".js_seletorScriptUpload");
        var _seletorBtn = $(".Upload");
        var _seletorEnviando = $("#js_enviandoUpload");
        var _seletorErro = $("#js_errorUpload");
        var _seletorSucesso = $("#js_sucessoUpload");
        
        //requisicao Ajax
        $.ajax({
            url: _urlphp,
            data: _dados,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function() {
                        _seletorEnviando.fadeIn(100);
                        _seletorBtn.attr('disabled', 'disabled');
                    }, false);
                }
                return myXhr;
                
                
            },
            success: function(data) {
              //variaveis locais 
                var _error = data.error;
                
                //esconder mensagem de enviando
                setTimeout(function(){
                    _seletorEnviando.fadeOut(0,function(){
                        //Verifica se houver erro
                        if(!_error) {
                                _seletorSucesso.fadeIn(1000);
                           }else{
                                _seletorErro.fadeIn(500);
                           }
                        //esconder os tickets - seja qual for
                    });    
                },5500);
            }
        });
        return false;
    });
  });