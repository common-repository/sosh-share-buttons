jQuery(function($){
    alert('vsfs');
    $("#sosh_btns_checkAll").click(function(){
            console.log('#sosh_btns_checkAll');
            $('#sosh_btns_checklist').find('input:checkbox').not(this).prop('checked', this.checked);
    });
    $("#sosh_pages_checkAll").click(function(){
            console.log('#sosh_pages_checkAll');
            $('#sosh_pages_checklist').find('input:checkbox').not(this).prop('checked', this.checked);
    });
});