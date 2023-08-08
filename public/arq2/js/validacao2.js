$('#btn_usuario').click(function() {
    var campo_vazio = false;

    if ($('#nome').val() == '') {
        $('#nome').css('border-color', '#A94442');
        campo_vazio = true;
        $('#texto').html("preencha todos os campos");
    } else {
        $('#nome').css('border-color', '#ccc');
        $('#texto').html("");
    }

    if ($('#preco').val() == '') {
        $('#preco').css('border-color', '#A94442');
        campo_vazio = true;
        $('#texto').html("preencha todos os campos");
    } else {
        $('#preco').css('border-color', '#ccc');
        $('#texto').html("");
    }

    if ($('#qnt').val() == '') {
        $('#qnt').css('border-color', '#A94442');
        campo_vazio = true;
        $('#texto').html("preencha todos os campos");
    } else {
        $('#qnt').css('border-color', '#ccc');
        $('#texto').html("");
    }
    if (campo_vazio)
        return false;

})