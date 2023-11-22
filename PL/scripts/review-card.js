$(document).ready(function () {
  const urlParams = new URLSearchParams(window.location.search);
  const menuItemId = urlParams.get('menuitemid');

  const reviewRowsContainer = $(".menuitem-review-main");
  const averageReviewElem = $("[data-average-review]");
  const starIcon = '<svg class="star-icon" viewBox="0 0 43 40" fill="none" xmlns="http://www.w3.org/2000/svg"> ... </svg>';

  // Make an AJAX call to get dynamic review data
  $.ajax({
    url: 'reviews_all_menuitem.php',
    method: 'POST',
    data: { menuitem_id: menuItemId },
    success: function (data) {
      let x = data;
      x = cleanString(x);
      x = JSON.parse(x);
      // Clear existing content in review-rows container
      reviewRowsContainer.empty();

      // Append User Rating
      const userRatingSection = $('<div class="user-rating-section"></div>');
      userRatingSection.append('<span class="heading">User Rating</span>');
      for (let i = 1; i <= 5; i++) {
        const starClass = i <= data.averageRating ? 'checked' : '';
        userRatingSection.append(`<span class="fa fa-star ${starClass}"></span>`);
      }
      userRatingSection.append(`<p>${data.averageRating.toFixed(1)} average based on ${data.reviews.length} reviews.</p>`);
      userRatingSection.append('<hr style="border:3px solid #f1f1f1">');
      reviewRowsContainer.append(userRatingSection);

      // Append review bars
      const reviewBarsSection = $('<div class="row"></div>');
      for (let i = 5; i >= 1; i--) {
        const starCount = data.reviewCounts[i] || 0;
        const barContainer = $('<div class="bar-container"></div>');
        const bar = $(`<div class="bar-${i}"></div>`).css('width', `${(starCount / data.reviews.length) * 100}%`);
        const sideRight = $('<div class="side right"></div>').text(starCount);
        reviewBarsSection.append(
          $('<div class="side"></div>').text(`${i} star`),
          $('<div class="middle"></div>').append(barContainer.append(bar)),
          sideRight
        );
      }
      reviewRowsContainer.append(reviewBarsSection);
    },
    error: function (xhr, status, error) {
      // Log the details of the error
      console.log('XHR status:', status);
      console.error('AJAX error:', error);
      // Show an alert with the error message
      alert("Error occurred while processing the request.");
    }


    
  })


  function cleanString(input) {
    // Replace \, \r, \n, \n-*, \\, and \\\ with an empty string
    let x = input.replace(/\\|\r|\n|\n-\*|\\\\|\\\\\\|-\*|\\/g, '');
    x = x.replaceAll('\\', ''); 
    return x;
  }
});
