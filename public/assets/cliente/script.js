$(document).ready(function () {
    $('#tblCliente').DataTable({
        dom: 'Bfrtip',
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada Encontrado",
            "info": "Mostrando páginas _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum equipamento encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "paginate": {
                "previous": "Anterior",
                "next": "Próximo"
            },
            "search": "Pesquisar"
        },
    });
 
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
                alert("Ocorreu um erro buscar o endereço do cliente.");
            }
        });
    });
    /****
     * @description: Carregando o ID do cinete para confirmar a exclusão.
     * @param id
     * @returns Cliente
     */
    $('table tr td #btnExcluir').on('click', function () {

        var id = $(this).attr("id_cliente");
        let url = $(this).data('url');

        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $.ajax({
            type: 'GET',
            url: url,
            data: { 'id': id },
            success: function (data) {
                // Carregando as Informações do cliente dentro modal   
                console.log(data);
                $("#id_excluir").val(data.id);

                $('#confirmaExclucao').modal('show');
            },
            error: function () {
                alert("Ocorreu um erro carregar o equipamento.");
            }
        });
    });
    
});