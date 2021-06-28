function getArrayDataIds (className) {
    var classItems = document.getElementsByClassName(`${className}`);
    var checkedItems = [];
    for (var i=0; i<classItems.length; i++) {
        let item = classItems[i];
        if (item.checked==true) {
            var lastIndex = checkedItems.lastIndexOf(checkedItems);
            checkedItems[lastIndexOf+1] = item.tagName;
        }
    }
    return checkedItems;
}