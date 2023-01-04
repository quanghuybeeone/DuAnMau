function creatProduct(code_img,code_category,name,cost,price){
    var product = new Object();
    product.img = 'img/image-product/product-'+code_img+'/image-1.png';
    product.category = code_category;
    product.name = name;
    product.cost = cost;
    product.price = price;
    product.formStrJson = function (){
        var strJson = JSON.stringify(this);
        return strJson;
    }
    return product;
}
