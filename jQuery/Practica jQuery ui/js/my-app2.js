/**
 * Created by Lalo on 09/03/2016.
 */


$(function () {
    var icons = {
        header: "ui-icon-circle-arrow-e",
        headerSelected: "ui-icon-circle-arrow-s"
    };
    $("#accordion").accordion({
        collapsible: true,
        icons: icons,
        active: -1
    });
    $("#tabs").tabs();
    $("#datepicker").datepicker();


});