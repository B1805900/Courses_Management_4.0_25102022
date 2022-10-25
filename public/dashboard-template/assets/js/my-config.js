
CKEDITOR.replace( 'ckeditor' );
setTimeout(fade_out, 5000);
function fade_out() {
  $(".msg").fadeOut().empty();
}
$('input.price').on('input', function(e){
    $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
}).on('keypress',function(e){
    if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
}).on('paste', function(e){
    var cb = e.originalEvent.clipboardData || window.clipboardData;
    if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
});
function formatCurrency(number){
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
    return  n2.split('').reverse().join('') + 'VNĐ';
}
function formatNumber(nStr, decSeperate, groupSeperate) {
    nStr += '';
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
    }
    return x1 + x2;
}

$('.price').text(formatNumber(700000, '.', ','))



$('#avatar-edit-input').on('change', function(event){
    console.log('picked avatar')
    const file = URL.createObjectURL(event.target.files[0]);
    console.log(file)
    if (file) {
      $('#avatar-edit').attr('src',file)
    }
  })





