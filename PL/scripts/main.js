$(document).ready(function () {
    const header = $("header");

    // Add a scroll event listener using jQuery
    $(window).scroll(function () {
        // Toggle the "sticky" class on the header when scrolling
        header.toggleClass("sticky", $(window).scrollTop() > 0);
    });

    let menu = $("#menu-icon");
    let navbar = $(".navbar");

    // Add a click event handler to the menu icon
    menu.click(function () {
        // Toggle the "bx-x" class on the menu icon
        menu.toggleClass('bx-x');
        // Toggle the "open" class on the navbar
        navbar.toggleClass('open');
    });

    // Add a scroll event handler to the window
    $(window).scroll(function () {
        // Remove the "bx-x" class from the menu icon
        menu.removeClass('bx-x');
        // Remove the "open" class from the navbar
        navbar.removeClass('open');
    });

    // Create a ScrollReveal instance
    const sr = ScrollReveal({
        distance: '30px',
        duration: 2500,
        reset: true
    });

    // Reveal elements with specified animations and delays
    sr.reveal('.home-text', { delay: 200, origin: 'left' });
    sr.reveal('.about_us_cover', { delay: 200, origin: 'top' });
    sr.reveal('.Restaurant_Info, .about, .menu, .footer, .meet_our_team', { delay: 200, origin: 'bottom' });


    $('body').on('click', '.menuitem-image', function () {
        var menuitemId = $(this).data("menuitemid");
        var menuitemUrl = 'menuitem.php?menuitemid=' + menuitemId;
        window.location.href = menuitemUrl;
    });

    $('body').on('click', '.add-to-cart-button', function(e){
        e.preventDefault();
        addToCart(e.target);
    });

    // function to add to cart
    function addToCart($source) {
        let $oldSource = $source;
        $source = $($source).closest(".featured-items-row");
        if($source.length === 0){
            $source = $($oldSource).closest("#menuitem-details");
        }
        // get the name of menu item
        let $name = ($($source).find(".menu-left > h4").text().trim());
        // get base price of menu item
        let $defaultPrice = ($($source).find(".menu-right > h5:first-child").text().replace(/\$/g, '').trim());
        // get image link of menu item
        let $imageLink = ($($source).find(".menuitem-image").attr('src'));
        if($imageLink === undefined){
            $imageLink = ($("#menuitem-image-inner").attr('src'));
        }
        // get variant name chosen if any
        let $variantName = ($($source).find(".variant-button-active").text().trim());// this is a button
        // get quantity of item
        let $quantity = ($($source).find(".ctrl__counter-num").text().trim());
        //check if quantity is 0 and show a prompt
        if ($quantity == 0) {
            showModal('Error', 'Quantity cannot be 0. Please choose a valid quantity.');
            return; 
        }
        let requestData = {
            name: $name,
            defaultPrice: $defaultPrice,
            imageLink: $imageLink,
            variantName: $variantName,
            quantity: $quantity
        };
        $.ajax({
            type: "POST",
            url: "add_to_cart.php",
            data: requestData,
            success: function (response) {
                showModal('Success', 'Item added to cart successfully!');
                $($source).find(".ctrl__counter-num").text("0");
                $($source).find(".last-row-price").addClass("hidden-word");
            },
            error: function (xhr, status, error) {
                showModal('Error', 'Error adding item to cart. Please try again later.');
            }
        });
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

        $('#customModal').on('click', '.close', function() {
            $('#customModal').modal('hide');
        });
        
        $('#customModal').on('click', '.btn-secondary', function() {
            $('#customModal').modal('hide');
        });
        
        $('#customModal').on('click', function(event) {
            if ($(event.target).hasClass('modal')) {
                $('#customModal').modal('hide');
            }
        });

    }
});