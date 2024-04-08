/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

$('body').on('change', '.custom-file-input', function(e){
    var fileName = e.target.files[0].name;
    $(this).next('.custom-file-label').html(fileName);
});

$('.select2').select2({
    theme: 'bootstrap4',
    placeholder: 'Select an option',
    allowClear: true
});
$('.datepicker').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    timePicker: false,
    locale: {
        format: 'YYYY-MM-DD'
    }
});
$('.timepicker').daterangepicker({
    singleDatePicker: true,
    timePicker: true,
    timePickerIncrement: 1,
    timePickerSeconds: false,
    locale: {
        format: 'hh:mm A'
    }
}).on('show.daterangepicker', function (ev, picker) {
    picker.container.find(".calendar-table").hide();
});
// show alert on submiting the form
$('.formAlert').submit(function(e) {
    e.preventDefault();
    $.confirm({
        icon: 'fa fa-question-circle-o',
        theme: 'material',
        closeIcon: true,
        animation: 'scale',
        type: 'blue',
        title: 'Confirm!',
        content: 'Are you sure, you want to do this ?',
        buttons: {
            confirm: {
                btnClass: 'btn-blue',
                action: function () {
                    this.$$confirm.attr('disabled',true);
                    e.currentTarget.submit();
                },
            },
            cancel: function () {},
        }
    });
})
window.waiting = {
    run_wait: function (){
        $('.content-wrapper').waitMe({
            effect: 'timer',
            text: 'Please wait...',
            bg: 'rgba(255,255,255,0.7)',
            color: '#000',
            waitTime: -1,
            source: 'img.svg',
            textPos: 'vertical'
        });
    },
    hide_wait: function (){
        $('.content-wrapper').waitMe('hide');
    }
};
