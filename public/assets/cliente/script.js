$(document).ready(function () {
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#logradoro").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
        $("#pais").val("");
    }

    $('#cep').focusout(function(){
        var cep = $('#cep').val();
        cep = cep.replace("-","");

        var urlStr = "https://viacep.com.br/ws/"+cep+"/json/";

        $.ajax({
            url: urlStr,
            type: 'get',
            dataType:'json',

            success: function (data) {
                console.log(data);
                $('#logradouro').val(data.logradouro);
                $('#bairro').val(data.bairro);
                $('#cidade').val(data.localidade);
                $('#estado').val(data.uf);
                $('#complemento').val(data.complemento);
               
            },
            error: function () {
                alert("Ocorreu um erro carregar o equipamento.");
            }
        });
    });
    
});