/**
 * Created by Lalo on 07/03/2016.
 */


$(function () {
    $('#btn-trigger').click(function () {
        runEffects();
        return false;
    });
});

function runEffects() {
    var divEffect = $('#effect');
    divEffect.effect('bounce', 'slow', 500);
    divEffect.animate({
        backgroundColor: 'red',
        color: 'blue',
        width: 500
    }, 1000);
}