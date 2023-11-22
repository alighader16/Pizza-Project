function removeItem(index) {
    $.ajax({
        type: "POST",
        url: "process_remove_item.php",
        data: { index: index },
        success: function (response) {
            if (response === 'success') {
                $('table tbody tr').eq(index).remove();
                calculateTotalPrice();
            } else {
                alert('Error removing item. Please try again.');
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred. Please try again.');
        }
    });
}

function calculateTotalPrice() {
    let totalPrice = 0;
    $('table tbody tr:not(#finalRow)').each(function () {
        let quantity = parseInt($(this).find('input[name="quantity"]').val());
        let unitPrice = parseFloat($(this).find('td:eq(3)').text());
        let finalPrice = quantity * unitPrice;
        $(this).find('td:eq(5)').text(finalPrice);
        totalPrice += finalPrice;
    });
    $('#finalPrice').text("$" + totalPrice.toFixed(2));
}

$(document).ready(function () {
    calculateTotalPrice();
});

$('table tbody').on('change', 'input[name="quantity"]', function () {
    calculateTotalPrice();
});

function validateForm() {
    var form = document.querySelector('form');
    var inputs = form.querySelectorAll('input');
    var isValid = true;

    inputs.forEach(function (input) {
        if (input.value.trim() === '') {
            isValid = false;
            var errorMessage = input.closest('.formControl').querySelector('.error-paragraph');
            errorMessage.textContent = 'This field is required.';
            errorMessage.classList.remove('hidden');
        }
    });

    return isValid;
}

function clearForm() {
    $('form input[type="text"]').val('');
    $('form input[type="tel"]').val('');
    $('.error-paragraph').addClass('hidden').text('');
}

function submitForm() {
    if (validateForm()) {
        var orderDetails = {
            name: $('#name').val(),
            address: $('form input[name="address"]').val(),
            phone: $('form input[name="phone"]').val(),
            orderRef: generateRandomOrderRef(),
            finalPrice: $("#finalPrice").text().replace("$", "")
        };
        $.ajax({
            type: "POST",
            url: "order-now.php",
            data: { orderDetails: orderDetails, cartItems: getCartItems() },
            success: function (response) {
                if (response === 'success') {
                    alert('Order placed successfully!');
                    clearForm();
                    unset($_SESSION['cart']);
                    showModal("Success!", "Your Order Has Been Placed");
                    window.location.href = '../profile.php';
                } else {
                    showModal("Error", "An Error Occured While Processing Your Order!")
                }
            },
            error: function (xhr, status, error) {
                showModal("Error", "An Error Occured While Processing Your Order!")
            }
        });
        clearForm();
    }
    return false;
}


function generateRandomOrderRef() {
    var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var orderRef = '';
    for (var i = 0; i < 8; i++) {
        orderRef += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return orderRef;
}
// function to show Bootstrap modal
function showModal(title, message) {
    // create modal markup
    let modalHtml = `
                        <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="customModalLabel">${title}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Okay">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">${message}</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;

    $('body').append(modalHtml);

    $('#customModal').modal('show');

    $('#customModal').on('hidden.bs.modal', function () {
        $(this).remove();
    });

    $('#customModal').on('click', '.close', function () {
        $('#customModal').modal('hide');
    });

    $('#customModal').on('click', '.btn-secondary', function () {
        $('#customModal').modal('hide');
    });

    $('#customModal').on('click', function (event) {
        if ($(event.target).hasClass('modal')) {
            $('#customModal').modal('hide');
        }
    });
    function getCartItems() {
        var cartItems = [];

        $('table tbody tr:not(#finalRow)').each(function () {
            var item = {
                name: $(this).find('td:eq(2)').text(),
                unitPrice: parseFloat($(this).find('td:eq(3)').text()),
                quantity: parseInt($(this).find('input[name="quantity"]').val())
            };

            cartItems.push(item);
        });

        return cartItems;
    }
}
