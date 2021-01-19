//function to sort products
function sort(field, order) {
    if (field == 'price') {
        if (order == 'l2h') {
            show_products(products.sort(function (a, b) {
                return a.price - b.price;
            }));
        } else if (order == 'h2l') {
            show_products(products.sort(function (a, b) {
                return b.price - a.price;
            }));
        }
    } else if (field == 'rating') {
        if (order == 'l2h') {
            show_products(products.sort(function (a, b) {
                return a.rating - b.rating;
            }));
        } else if (order == 'h2l') {
            show_products(products.sort(function (a, b) {
                return b.rating - a.rating;
            }));
        }
    }
}
//function to filter products
function filter(field) {
    if (field == 'price') {
        var low = document.querySelector('#f-p-low').value || 0;
        var high = document.querySelector('#f-p-high').value || 9999999;
        show_products(products.filter(function (a) {
            if (a.price >= low && a.price <= high) {
                return true;
            } else {
                return false;
            }
        }));
    } else if (field == 'rating') {
        var low = document.querySelector('#f-r-low').value || 0;
        var high = document.querySelector('#f-r-high').value || 5;
        show_products(products.filter(function (a) {
            if (a.rating >= low && a.rating <= high) {
                return true;
            } else {
                return false;
            }
        }));
    }
}