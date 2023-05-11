$('.slide-one').owlCarousel({
    loop:       true,
    margin:     10,
    items:      5,
    nav:        true,
    responsive: {
        0:    {
            items: 1
        },
        600:  {
            items: 3
        },
        1000: {
            items: 5
        }
    },
    navClass:   ['owl-prev-local', 'owl-next-local'],
    center:     true,
    margin:     20,
});
$('.slide-two').owlCarousel({
    loop:       true,
    margin:     10,
    items:      3,
    nav:        true,
    responsive: {
        0:    {
            items: 1
        },
        600:  {
            items: 2
        },
        1000: {
            items: 3
        }
    },
    navClass:   ['owl-prev-local', 'owl-next-local'],
    center:     true,
    margin:     20,
});