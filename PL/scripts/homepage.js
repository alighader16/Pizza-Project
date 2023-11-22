$(document).ready(function () {
  $(".variant-button").click(function (e) {
    //get the parent of the clicked button
    var parent = $(this).parent().parent();

    //remove the "variant-button-active" class from all children of the parent
    parent.find(".variant-button").removeClass("variant-button-active");

    //add the "variant-button-active" class to the clicked button
    $(this).addClass("variant-button-active");

    p = $(this).parent().children().eq(1);//get the 2nd child which is the p element
    value = parseFloat($(p).text()); /// get the value of the p element

    cardParent = $(this).closest(".featured-items-row"); // get the card container
    var formattedValue = parseFloat(value).toFixed(2); //format number to be rounded to 2 decimals

    $(cardParent).find("h5").text("$" + formattedValue); // set value of the price top right of the card

    //formattedValue = base price
    //now get quantity
    quantity = parseFloat($(cardParent).find(".ctrl__counter-num").text());
    formattedQuantity = parseFloat(quantity).toFixed(2);
    //multiply price by quantity
    price = formattedQuantity * formattedValue;
    formattedPrice = parseFloat(price).toFixed(2);
    $(cardParent).find(".last-row-price").text("$" + formattedPrice);
  });
});