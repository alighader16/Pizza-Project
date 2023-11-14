$(document).ready(function () {
    updateMenuContent();
    function updateMenuContent() {
        var formData = $("#menu-search").serialize();
        var selectedCategory = $(".tabs-box .tab.active").text();
        formData += "&category=" + encodeURIComponent(selectedCategory);

        $.ajax({
            type: "POST",
            url: "search-menu.php",
            data: formData,
            dataType: "json", 
            success: function (data) {
                $("#menu-items-main").empty();


                if (data.length > 0) {
                    data.forEach(function (menuitem) {
                        var ingredientTitles = menuitem.ingredients.join(", ");
                        var fullStars = Math.floor(menuitem.rating);
                        var halfStar = (menuitem.rating - fullStars) >= 0.5;
                        console.log(menuitem.query);
                        // Construct HTML for the menu item
                        var menuItemHTML = `
                            <div class="featured-items-row">
                                <img src="${menuitem.image}" alt="${menuitem.title}">
                                <div class="menu-text">
                                    <div class="menu-left">
                                        <h4>${menuitem.title}</h4>
                                    </div>
                                    <div class="menu-right">
                                        ${menuitem.discount > 0 ? '<h5 class="discount-h5">' + menuitem.discount + '</h5><h5 class="cancelled-number">' + menuitem.default_price + '</h5>' : ''}
                                        <h5>${"$" + menuitem.default_price}</h5>
                                    </div>
                                </div>
                                <p class="ingredient-list">${ingredientTitles}</p>
                                <div class="star">
                                ${Array(fullStars).fill('<a href="#"><i class="bx bxs-star"></i></a>').join('')}
                                ${halfStar ? '<a href="#"><i class="bx bxs-star-half"></i></a>' : ''}
                                ${Array(5 - fullStars - (halfStar ? 1 : 0)).fill('<a href="#"><i class="bx bx-star"></i></a>').join('')}
                                </div>
                                <div class="variants-row ${menuitem.variants.length === 0 ? 'invisible' : ''}">
                                    <div class="variant-row ${menuitem.variants.length === 0 ? 'invisible' : ''}">
                                        ${menuitem.variants.length === 0 ? 
                                            '<div class="variant">' +
                                                '<button class="variant-button variant-button-active">fds</button>' +
                                                '<p> fsd </p>' +
                                            '</div>'
                                        : ''}
                                        ${menuitem.variants.map(function(variant, index) {
                                            return `
                                                <div class="variant">
                                                    <button class="variant-button ${index === 0 ? 'variant-button-active' : ''}">${variant.title}</button>
                                                    <p>${variant.price}</p>
                                                </div>
                                            `;
                                        }).join('')}
                                    </div>
                                </div>

                                <div class="last-row-menuitem">
                                    <h5 class="last-row-price hidden-word">$0</h5>
                                    <div class="menuitem-controls">
                                        <div class='ctrl'>
                                            <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                                            <div class='ctrl__counter'>
                                                <input class='ctrl__counter-input' maxlength='100' type='text' value='0'>
                                                <div class='ctrl__counter-num'>0</div>
                                            </div>
                                            <div class='ctrl__button ctrl__button--increment'>+</div>
                                        </div>
                                        <a href="#" class="add-to-cart-button"><i class='bx bx-cart'></i></a>
                                    </div>
                                </div>
                            </div>`;

                        $("#menu-items-main").append(menuItemHTML);
                        addScriptsToDiv();
                    });
                } else {
                    $("#menu-items-main").html("<p id='menu-none-found'>No results found.</p>");
                }
            },
            error: function () {
                alert("Error occurred while processing the request.");
            }
        });
    }

    $("#menu-search").submit(function (event) {
        event.preventDefault();
        updateMenuContent();
    });


     $('#sort').change(function () {
        updateMenuContent();
    });

    $('#exclude').change(function () {
        updateMenuContent();
    });

    $('.tabs-box .tab').click(function () {
        $('#menu-search').submit();
        console.log("here");
    });

    $('#search-input').keyup(function () {
        updateMenuContent();
    });

    $('#button-reset').click(function () {
        $('.tabs-box .tab:first-child').addClass('active').siblings().removeClass('active');
        $('#search-input').val('');
        $('#exclude').val($('#exclude option:first').val());
        $('#sort').val($('#sort option:first').val());
        updateMenuContent();
    });


    function addScriptsToDiv() {
        var scriptSources = [
            "https://unpkg.com/scrollreveal",
            "scripts/main.js",
            "scripts/category-slider.js",
            "scripts/homepage.js",
            "scripts/input-quantity.js",
        ];
    
        var scriptsDiv = $("#scripts");
    
        scriptsDiv.empty();
    
        scriptSources.forEach(function (src) {
            var scriptElement = $("<script>");
            scriptElement.attr("src", src);
            scriptsDiv.append(scriptElement);
        });
    }


});
