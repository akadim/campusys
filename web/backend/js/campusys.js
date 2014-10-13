/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".mws-datepicker").datepicker();
$(".mws-datepicker-from").datepicker({
    changeMonth: true,
    dateFormat: 'dd/mm/yy',
    changeYear: true
});
$(".mws-datepicker-to").datepicker({
    dateFormat: 'dd/mm/yy',
    changeMonth: true,
    changeYear: true
});
function is_checked(index)
{
    droits = document.getElementsByName("itcertif_userbundle_profil[droits][]");

    for (var i = 0; i < droits.length; i++)
    {
        if (i == index && droits[i].checked)
            return true;
    }
    return false;
}
function validate_cell_edit(currentVal, type_champs, column, identifiant)
{

    var newVal = $('#txtEditing').val();
    if (newVal !== currentVal)
    {
        $.get("editColumn/" + column + "/" + newVal + "/" + identifiant, function(response) {
            if (response.indexOf("invalide") === -1)
            {
                $("." + type_champs + "_" + column + "_" + identifiant).html("" + response);
                $(".alert").html("<div class='mws-form-message success'>" +
                        "Modification effectu&eacute;e avec succ&egrave;s" +
                        "<i class='ui-icon ui-icon-closethick' style='float: right;' onclick='$(\".mws-form-message\").slideUp();'></i>" +
                        "</div>");
            }
            else
            {
                response = response.split("-");
                $(".alert").html("<div class='mws-form-message error'>" +
                        "Echec de modification: " + response[1] +
                        "<i class='ui-icon ui-icon-closethick' style='float: right;' onclick='$(\".mws-form-message\").slideUp();'></i>" +
                        "</div>");
                $("." + type_champs + "_" + column + "_" + identifiant).html("" + currentVal);
            }
        });
    }
    else {
        $("." + type_champs + "_" + column + "_" + identifiant).html("" + newVal);
    }
}
if ($.fn.dataTable) {
    $(".mws-datatable").dataTable({
        // bServerSide: true,
        // sAjaxSource: "table"
    });
    $(".mws-datatable-fn").dataTable({
        sPaginationType: "full_numbers"
    });
}
if ($.fn.cleditor) {
    $('.cleditor').cleditor();
    $('.cleditorMain').attr('class', 'cleditorMain large');
    $('.cleditorMain').attr('style', '');
}
$(document).ready(function() {


    $(".mws-tabs").tabs();

    $("#mws-validate").validate();

    $(document).on("click", ".active_formation_link", function(event) {
        alert("kadim");
        event.preventDefault();
        var form_id = parseInt($(this).attr('id'));
        $.get("active/" + form_id, function(response) {
            response = parseInt(response);
            alert(response);
            if (response == 0)
            {
                $("#active_formation_" + form_id).attr('class', 'badge badge-important');
                $("#active_formation_" + form_id).html('Non');
            }
            else
            {
                $("#active_formation_" + form_id).attr('class', 'badge badge-info');
                $("#active_formation_" + form_id).html('Oui');
            }
        });
    });

    $(document).on("click", ".view_element", function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        id = id.substring(5);
        $.get("view/" + id, function(response) {
            $('#mws-jui-dialog').html(response);
            $('#mws-jui-dialog').attr("title", "Information");
            $("#mws-jui-dialog").dialog({
                modal: true,
                width: "640",
                dialogClass: 'dlgfixed',
                position: "center"

            }).dialog("open");
            e.preventDefault();

        });
    });

    $(document).on("change", "#check_form", function(e) {
        e.preventDefault();
        rows = $("#row_selected").val();
        $("#row_selected").val(rows + "-" + $(this).val());
        alert($("#row_selected").val());
    });

    $(document).on("dblclick", ".cell_edit", function() {
        var classes = $(this).attr('class').trim().split(" ");
        var currentVal = $(this).text();


        /* décomposition de la classe en 3 variables (type de champs, column, identifiant) */
        var variableCompose = classes[1];
        var type_champs = variableCompose.substring(0, 5);
        variableCompose = classes[1].substring(6);
        var column = variableCompose.substring(0, variableCompose.indexOf("_"));
        var identifiant = variableCompose.substring(variableCompose.indexOf("_") + 1, variableCompose.length);
        /*-------------------------------------------------------------*/

        var contenu_td = "";
        if (type_champs === "texte")
        {
            contenu_td = "<input type='text' id ='txtEditing' value='" + currentVal + "'>";
        }
        else if (type_champs === "combo")
        {

            $.ajax({
                url: 'show_combo/' + column,
                success: function(response) {
                    contenu_td = response;
                },
                async: false
            });
        }
        /*
         else
         {
         contenu_td = "<input type='text' id ='txtEditing' class='mws-datepicker' value='" + currentVal + "' readonly='readonly'>"+
         "<script type='text/javascript'> $(function() {$( '#txtEditing' ).datepicker();});</script>";
         $(".mws-datatable").on("focus", "#txtEditing", function(e){
         e.preventDefault();
         $("#txtEditing").datepicker();
         $('#ui-datepicker-div').removeClass('ui-helper-hidden-accessible'); 
         });
         }
         */
        $(this).html(contenu_td);

        $(this).children().first().focus();


        $(this).children().first().keypress(function(e) {
            if (e.which === 13)
            {
                validate_cell_edit(currentVal, type_champs, column, identifiant);
                e.preventDefault();
            }
        });

        $(this).children().first().blur(function(e) {
            validate_cell_edit(currentVal, type_champs, column, identifiant);
        });
    });

    $(document).on("click", ".checkAll", function() {
        var params = $("input[type='checkbox']");
        params.each(function() {
            this.checked = true;
        });
    });

    $(document).on("click", ".uncheckAll", function() {
        var params = $("input[type='checkbox']");
        params.each(function() {
            this.checked = false;
        });
    });

    $("#form_ville").submit(function(event) {
        event.preventDefault();
        url = $(this).attr('action');
        param = $("#itcertif_configurationbundle_ville_libelle").val();
        $.post(url, {'ville': param}, function(response) {
            $('#ville_listing').html(response);
        });
    });

    $(".mws-stat-icon").click(function(event) {
        event.preventDefault();
        var ville_id = $(this).attr('id');
        var url = "delete/" + ville_id;
        $.get(url, function(response) {
            $('#ville_listing').html(response);
        });
    });

    $(document).on("click", ".gallery-btn", function(event) {
        event.preventDefault();
        var image_id = $(this).attr('id');
        var url = "admin/delete/" + image_id;
        $.get(url, function(response) {
            $('#picture_elements').html(response);
        });
    });

    $(document).on("click", ".partenaire-btn", function(event) {
        event.preventDefault();
        var image_id = $(this).attr('id');
        var url = "delete/" + image_id;
        $.get(url, function(response) {
            $('#picture_elements').html(response);
        });
    });

    $(".mws-datepicker-from").datepicker({
        changeMonth: true,
        dateFormat: 'dd/mm/yy',
        changeYear: true
    });
    $(".mws-datepicker-to").datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true
    });


    $(document).contextmenu({
        delegate: ".hasmenu",
        menu: "#options",
        select: function(event, ui) {
            alert("select  on " + $(this).parent().attr("id"));
        }
    });

    //$(".dlgfixed").center(false);

    $(".ui-icon-closethick").click(function(event) {
        event.preventDefault();
        $(".mws-form-message").slideUp();
    });

    $(document).on("click", ".add_phone", function(e) {
        e.preventDefault();
        var lastInput = $("input[name^='itcertif_configurationbundle_configurationgeneral[tel']").last();
        var lastInputName = lastInput.attr('name');
        var lastId = parseInt(lastInputName.substring(lastInputName.indexOf('[') + 4, lastInputName.indexOf(']')));
        var nextId = lastId + 1;
        $("<div class='mws-form-row row-" + nextId + "'>" +
                "<label for='itcertif_configurationbundle_configurationgeneral_tel" + nextId + "' class='mws-form-label required'></label>" +
                "<div class='mws-form-item'>" +
                "<input type='text' value='' class='required large' required='required' name='itcertif_configurationbundle_configurationgeneral[tel" + nextId + "]' id='itcertif_configurationbundle_configurationgeneral_tel" + nextId + "'>" +
                "</div>" +
                "</div>").insertAfter(".row-" + lastId);

    });

    
});

droits_bloc = document.getElementById("itcertif_userbundle_profil_droits");
droits_label = droits_bloc.getElementsByTagName("label");
droits_number = droits_label.length;
nb_droits_lignes = Math.ceil(droits_number / 4);

droit_table = document.createElement("table");
droit_table.setAttribute('class', 'droit_table');

row = droit_table.insertRow(0);

k = 1;
for (var i = 1; i <= nb_droits_lignes; i++)
{
    for (var j = 0; j < 4; j++)
    {
        if (k <= droits_number)
        {
            cell = row.insertCell(j);
            cell.innerHTML = '<input type="checkbox" value="' + k + '" name="itcertif_userbundle_profil[droits][]" id="itcertif_userbundle_profil_droits_' + k + '" ' + ((is_checked(k - 1)) ? 'checked="checked"' : '') + ' ><label for="itcertif_userbundle_profil_droits_' + k + '">' + droits_label[k - 1].innerHTML + '</label>';
            k++;
        }
    }
    row = droit_table.insertRow(i);
}
droits_bloc.innerHTML = "";
droits_bloc.appendChild(droit_table);

