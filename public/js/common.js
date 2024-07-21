const getProductListing = (productSeelctBox, route, namedArray = false) => {
    const productSelectBox = $(productSeelctBox);
    $.ajax({
        method: "GET",
        url: route,
        data: { _token: "{{ csrf_token()  }}" },
        success: (data) => {
            let sProductData;
            if (namedArray) {
                sProductData = data.products;
            } else {
                sProductData = data;
            }
            // Use jQuery to loop through the array and append product names as options to the select dropdown
            $.each(sProductData, function (index, product) {
                productSelectBox.append(
                    `<option value='${product.id}'>${product.product_name}</option>`
                );
            });
        },
    });
};
