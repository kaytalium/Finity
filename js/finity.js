Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});

jQuery.fn.extend({
    formatMoney : function(v){
        this.html('$' + parseFloat(v, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString())
    }
})

toMoneyFormat = (function(n){
    return '$' + parseFloat(n, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()
})

function scrollAndFreezeTableHead(scrollContainer,tbl,topofTable){
    scrollContainer.scroll(function (event) {
        // what the y position of the scroll is
        var y = $(this).scrollTop();
        console.log("y: "+y)
        // whether that's below the form
        if (y >= topofTable) {
          // if so, ad the fixed class
          
          tbl.floatThead({
            position: 'fixed'
            });
        } else {
          // otherwise remove it
          tbl.trigger('reflow');
        }
      });
}