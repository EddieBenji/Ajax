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
    //divEffect.effect('bounce', 'slow', 500);
    //divEffect.animate({
    //    backgroundColor: 'green',
    //    color: 'blue',
    //    width: 500
    //}, 1000);
//    divEffect.effect('scale', {percent: 0}, 500);
//    divEffect.effect('size', {to: {width: 200, height: 60}}, 500);
    divEffect.effect('transfer', {to: '#btn-trigger', className: 'ui-effects-transfer'}, 500);

    //Interactions with jquery
    //divEffect.draggable();
    divEffect.draggable();
}