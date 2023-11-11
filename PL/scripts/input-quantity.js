    $(document).ready(function() {
        
        'use strict';
        
        $('.featured-items-row').each(function() {
            var counter = 0;
            var $row = $(this);
            var $decrement = $row.find('.ctrl__button--decrement');
            var $counterContainer = $row.find('.ctrl__counter');
            var $counterNum = $row.find('.ctrl__counter-num');
            var $counterInput = $row.find('.ctrl__counter-input');
            var $increment = $row.find('.ctrl__button--increment');
            var $menuRightPrice = $row.find('.menu-right h5'); 
            var $totalPrice = $row.find('.last-row-price');

            function decrement() {
                var nextCounter = (counter > 0) ? --counter : counter;
                setCounter(nextCounter);
            }

            function increment() {
                var nextCounter = (counter < 9999999999) ? ++counter : counter;
                setCounter(nextCounter);
            }
        
            function getCounter() {
                return counter;
            }
        
            function setCounter(nextCounter) {
                counter = nextCounter;
                if (counter === 0) {
                    $totalPrice.addClass('hidden-word');
                } else {
                    $totalPrice.removeClass('hidden-word');
                }
            }
        
            function debounce(callback) {
                setTimeout(callback, 100);
            }
        
            function render(hideClassName, visibleClassName) {
                $counterNum.addClass(hideClassName);
                setTimeout(function() {
                    $counterNum.text(getCounter());
                    $counterInput.val(getCounter());
                    $counterNum.addClass(visibleClassName);
                    updateTotalPrice(); 
                }, 100);
                setTimeout(function() {
                    $counterNum.removeClass(hideClassName + ' ' + visibleClassName);
                }, 200);
            }
        
            function updateTotalPrice() {
                var totalPrice = getCounter() * parseFloat($menuRightPrice.text().replace('$', '')); 
                $totalPrice.text('$' + totalPrice.toFixed(2)); 
            }
        
            $decrement.on('click', function() {
                debounce(function() {
                    decrement();
                    render('is-decrement-hide', 'is-decrement-visible');
                });
            });
        
            $increment.on('click', function() {
                debounce(function() {
                    increment();
                    render('is-increment-hide', 'is-increment-visible');
                });
            });
        
            $counterInput.on('input', function(e) {
                var parseValue = parseInt(e.target.value);
                if (!isNaN(parseValue) && parseValue >= 0) {
                    setCounter(parseValue);
                    render();
                }
            });
        
            $counterInput.on('focus', function() {
                $counterContainer.addClass('is-input');
            });
        
            $counterInput.on('blur', function() {
                $counterContainer.removeClass('is-input');
                render();
            });
        });
        
    });
