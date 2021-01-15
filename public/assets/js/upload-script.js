$(document).ready(function() {
    $("#jscontrol").submit(function () {
        //variaveis locais
        var _dados = $(this).serializeArray();
        var _urlphp = $(this).attr("action");
        var _seletoralert = $(".js_seletorScript");
        var _seletorBtn = $(".btn-success");
        var _seletorEnviando = $("#js_enviando");
        var _seletorErro = $("#js_error");
        var _seletorSucesso = $("#js_sucesso");
        
        //requisicao Ajax
        $.ajax({
            url: _urlphp,
            data: {dados: _dados},
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                
                _seletorEnviando.fadeIn(100);
                _seletorBtn.attr('disabled', 'disabled');
                
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