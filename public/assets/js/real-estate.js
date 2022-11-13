$(function() {
    /* Handle list and grid view */
    $('#list').click(function(event) {
        event.preventDefault();
        $('#products .item').addClass('list-group-item');
    });
    $('#grid').click(function(event) {
        event.preventDefault();
        $('#products .item').removeClass('list-group-item');
        $('#products .item').addClass('grid-group-item');
    });

    /* Load data on scroll page */
    let page = 1;
    let limit = 12;
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 1 && page > 0) {
            $(".overlay").show();
            page++;
            $.ajax({
                url: '/list',
                type: "post",
                dataType: 'json',
                data: {
                    page: page
                }
            }).done(function(data) {
                let html = '';
                if (data.length < limit) {
                    page = 0;
                }

                $.each(data, function(i, row) {
                    html += '<div class="item col-xs-3 col-lg-3">';
                    html += '<div class="thumbnail card" data-price="' + row.price + '" data-size="' + row.size + '">';
                    html += '<div class="img-event">';
                    html += '<img class="group list-group-image img-fluid" src="' + row.image + '" alt="" /></div>';
                    html += '<div class="caption card-body">';
                    html += '<h6 class="group card-title inner list-group-item-heading">' + row.title + '</h6>';
                    html += '<p class="group inner list-group-item-text">' + row.address + '</p>';
                    html += '<div class="row">';
                    html += '<div class="col-xs-12 col-md-6 price"><b>Price:</b> ' + row.price + '</div>';
                    html += '<div class="col-xs-12 col-md-6 size"><b>Size:</b> ' + row.size + 'sqm</div>';
                    html += '</div></div></div></div>';
                });
                $("#products").append(html);
            }).fail(function() {
                alert('Something Wrong!');
            }).always(function() {
                $(".overlay").hide();
            });
        }
    });

    /* Sort record by price and size*/
    $(document).on("change", ".form-control", function() {
        let sorting = $(this).val().split('_');
        let gridItems = $('.item');

        gridItems.sort(function(a, b) {
            let sortOrder = sorting[1];
            let sortBy = sorting[0];

            if (sortOrder === 'asc') {
                return $('.card', a).data(sortBy) - $('.card', b).data(sortBy);
            } else if (sortOrder === 'desc') {
                return $('.card', b).data(sortBy) - $('.card', a).data(sortBy);
            }
        }, sorting);

        $(".view-group").append(gridItems);
    });

    /* Filter record by price and size*/
    $(".filter").on("keyup", function() {
        let id = $(this).attr("id");
        let value = $(this).val().toLowerCase();
        $("#products div.item").filter(function() {
            $(this).toggle($(this).find('.' + id).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

window.onbeforeunload = function () {
    window.scrollTo(0, 0);
}
