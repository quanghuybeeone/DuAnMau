function creatItem(title, price, img) {
    var item = new Object();
    item.img = img;
    item.title = title;
    item.price = price;
    item.toJson = function () {
        var json = JSON.stringify(this);
        return json;
    }
    item.fromJson = function (json) {
        var obj_item_full = new Object();
        var obj_item = JSON.parse(json);
        obj_item_full = creatObjItem(obj_item.title, obj_item.price, obj_item.img)
        return obj_item_full;
    }
    item.fromJsons = function (jsonItems) {
        var items_full = new Array();
        var items = JSON.parse(jsonItems)
        
        for(var i=0; i<items.length;i++){
            var item = items[i];
            var item_full = creatItem(item.title,item.price,item.img);
            items_full[i]=item_full;
        }
        return items_full;
    }
    return item;
}


