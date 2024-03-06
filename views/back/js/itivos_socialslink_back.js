$(function () {
    $("#itivos_socialslink_list_admin").sortable({
        placeholder: "ui-state-highlight",
        forcePlaceholderSize: true,
    });
    $("#itivos_socialslink_list_admin").sortable({
        start: function(event,ui){
            $(".element_iv").toggleClass('element_iv pasive_iv');
        },
        stop: function(event, ui){
            $(".pasive_iv").toggleClass('pasive_iv element_iv');
            itivosSocialLinkUpdateListOrder();
        }
    });
});
function itivosSocialLinkUpdateListOrder() {
    const order = $('#itivos_socialslink_list_admin li').children('span').map(function(){
        return $(this).attr('id_link');
    }).get();
    const urlSite = $("#url_site").val();
    const adminUri = $("#admin_uri").val();
    const url = `${urlSite}${adminUri}/modules/config/itivos_socialslink`;
    $.ajax({
        url: url,
        type: "POST",
        data: {order: order, action: "ajax", resource: "update_order"},
        success: function (results) {
            console.log("La orden de los sliders se ha actualizado correctamente");
        },
        error: function(xhr, status, error) {
            console.error("Error al actualizar el orden de los sliders:", error);
        }
    });
}
