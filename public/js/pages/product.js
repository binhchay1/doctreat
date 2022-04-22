var services = {
    '1': 'auto',
    '2': 'high',
    '3': 'low',
    '4': 'bestseller'
}

var url_string = window.location.href;
var url = new URL(url_string);
var arrange = url.searchParams.get("arrange");
var category = url.searchParams.get('category');

$(document).ready(function () {

    if (arrange != null || arrange != undefined) {
        $('.option-arrange').val(getKeyByValue(services, arrange));
        let elem = document.getElementById('shop-box-inner');
        window.scrollTo(0, elem.scrollHeight + 450);
    }

    $('.option-arrange').on('change', function () {
        let choice = this.value;
        let arrange = services[choice];
        
        if(category != null || category != undefined) {
            window.location.href = url.href + "&arrange=" + arrange;
        } else {
            window.location.href = "/product?arrange=" + arrange;
        }  
    });

    $('#category-area button').on('click', function() {
        let category = $(this).attr('title');
        
        if(arrange != null || arrange != undefined) {
            window.location.href = url.href + "&category=" + category;
        } else {
            window.location.href = "/product?category=" + category;
        } 
    });
});

function getKeyByValue(object, value) {
    return Object.keys(object).find(key => object[key] === value);
}

function getDetail(id) {
    let url = '/products-detail?id=' + id;
    window.location.href = url;
}